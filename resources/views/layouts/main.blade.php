<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>Посты</title>
    <style>
        .container{
            width: max-content;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <nav>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('profile.show', Auth::user()->id) }}">Моя страница</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">Посты</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.create') }}">Создать пост</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts.index') }}">Контакты</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
