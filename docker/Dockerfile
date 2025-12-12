FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev \
    zip unzip libpq-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

#COPY composer.json composer.lock ./

#RUN composer install --no-dev --optimize-autoloader

COPY . .

RUN echo "=== ДИАГНОСТИКА после COPY ===" && \
    echo "Содержимое /var/www:" && ls -la /var/www/ && \
    echo "Содержимое /var/www/public:" && ls -la /var/www/public/ && \
    echo "=== Конец диагностики ==="

RUN chown -R www-data:www-data /var/www/storage && \
    chmod -R 775 /var/www/storage

COPY docker/nginx.conf /etc/nginx/sites-available/default
COPY docker/start.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/start.sh

RUN echo "<?php echo 'OK'; ?>" > /var/www/public/health.php

EXPOSE 9000

# CMD ["php-fpm"]
