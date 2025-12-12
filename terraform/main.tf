terraform {
  required_providers {
    yandex = {
      source = "yandex-cloud/yandex"
    }
  }
}

provider "yandex" {
  zone = "ru-central1-a"
}

resource "yandex_iam_service_account" "sa" {
  name        = "app-service-account"
  description = "Service account for application"
}

resource "yandex_resourcemanager_folder_iam_member" "editor" {
  folder_id = var.folder_id
  role      = "editor"
  member    = "serviceAccount:${yandex_iam_service_account.sa.id}"
}

resource "yandex_resourcemanager_folder_iam_member" "storage_editor" {
  folder_id = var.folder_id
  role      = "storage.editor"
  member    = "serviceAccount:${yandex_iam_service_account.sa.id}"
}

resource "yandex_vpc_network" "app-network" {
  name = "app-network"
}

resource "yandex_vpc_subnet" "app-subnet" {
  name           = "app-subnet"
  zone           = "ru-central1-a"
  network_id     = yandex_vpc_network.app-network.id
  v4_cidr_blocks = ["192.168.10.0/24"]
}


resource "yandex_storage_bucket" "app-bucket" {
  bucket     = "app-static-bucket-${random_integer.bucket_suffix.result}"
  access_key = yandex_iam_service_account_static_access_key.sa-keys.access_key
  secret_key = yandex_iam_service_account_static_access_key.sa-keys.secret_key
}

resource "yandex_iam_service_account_static_access_key" "sa-keys" {
  service_account_id = yandex_iam_service_account.sa.id
}

resource "random_integer" "bucket_suffix" {
  min = 1000
  max = 9999
}

resource "yandex_compute_instance_group" "app-group" {
  name               = "app-instance-group"
  service_account_id = yandex_iam_service_account.sa.id
  instance_template {
    platform_id = "standard-v2"
    resources {
      memory = 2
      cores  = 2
    }

    boot_disk {
      initialize_params {
        image_id = "fd87vu8nn7f3o0j27g26" # Ubuntu 20.04 LTS
        size     = 20
      }
    }

    network_interface {
      network_id = yandex_vpc_network.app-network.id
      subnet_ids = [yandex_vpc_subnet.app-subnet.id]
    }

    metadata = {
      user-data = file("cloud-config.yaml")
    }
  }

  scale_policy {
    fixed_scale {
      size = 2
    }
  }

  allocation_policy {
    zones = ["ru-central1-a"]
  }

  deploy_policy {
    max_unavailable = 1
    max_expansion   = 0
  }

  load_balancer {
    target_group_name = "app-target-group"
  }
}


resource "yandex_alb_load_balancer" "app-balancer" {
  name               = "app-load-balancer"
  network_id         = yandex_vpc_network.app-network.id

  allocation_policy {
    location {
      zone_id   = "ru-central1-a"
      subnet_id = yandex_vpc_subnet.app-subnet.id
    }
  }

  listener {
    name = "app-listener"
    endpoint {
      address {
        external_ipv4_address {}
      }
      ports = [80]
    }
    http {
      handler {
        http_router_id = yandex_alb_http_router.app-router.id
      }
    }
  }
}

resource "yandex_alb_http_router" "app-router" {
  name = "app-http-router"
}

resource "yandex_alb_virtual_host" "app-virtual-host" {
  name           = "app-virtual-host"
  http_router_id = yandex_alb_http_router.app-router.id
  route {
    name = "app-route"
    http_route {
      http_route_action {
        backend_group_id = yandex_alb_backend_group.app-backend-group.id
      }
    }
  }
}

resource "yandex_alb_backend_group" "app-backend-group" {
  name = "app-backend-group"

  http_backend {
    name             = "app-backend"
    weight           = 1
    port             = 80
    target_group_ids = [yandex_compute_instance_group.app-group.application_load_balancer.0.target_group_id]

    healthcheck {
      timeout          = "10s"
      interval         = "2s"
      healthcheck_port = 80
      http_healthcheck {
        path = "/health"
      }
    }
  }
}

resource "yandex_function" "image-processor" {
  name               = "image-processor"
  description        = "Process images uploaded to storage"
  user_hash          = "image-processor-function"
  runtime            = "python39"
  entrypoint         = "main.handler"
  memory             = "128"
  execution_timeout  = "10"
  service_account_id = yandex_iam_service_account.sa.id

  content {
    zip_filename = "function.zip"
  }

  environment = {
    BUCKET_ID = yandex_storage_bucket.app-bucket.id
  }
}

resource "yandex_monitoring_dashboard" "app-dashboard" {
  name = "app-monitoring-dashboard"

  widgets {
    title = "CPU Usage"
    pos {
      x = 0
      y = 0
      w = 6
      h = 6
    }
    text {
      text = "CPU usage for instances"
    }
  }

  widgets {
    title = "Memory Usage"
    pos {
      x = 6
      y = 0
      w = 6
      h = 6
    }
    text {
      text = "Memory usage for instances"
    }
  }
}

output "load_balancer_ip" {
  value = yandex_alb_load_balancer.app-balancer.listener[0].endpoint[0].address[0].external_ipv4_address[0].address
}

output "bucket_name" {
  value = yandex_storage_bucket.app-bucket.bucket
}

output "database_host" {
  value = yandex_mdb_postgresql_cluster.app-db.host[0].fqdn
}
