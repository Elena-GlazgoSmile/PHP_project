<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            background-image: url('{{ asset('images/autorization.jpg') }}');
            background-size: cover;
            text-align: center;

        }
        form {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
        }
        h1{
            color: white;
        }
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Авторизация</h1>
        <h3><input type="email" name="email" placeholder="Email" required></h3>
        <h3><input type="password" name="password" placeholder="Пароль" required></h3>
        <button type="submit" class="btn btn-success"><h3>Войти</h3></button>
        <a href="{{ asset('register') }}"><h3>Ещё нет аккаунта? Кликай сюда!</h3></a>
    </form>
</body>
</html>

