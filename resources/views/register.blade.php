<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    @vite(['resources/sass/app.scss'])
    <style>
        body {
            display: flex;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('registerCreate') }}">
        @csrf

        <h3><input type="text" name="name" placeholder="Имя" required></h3>
        <h3><input type="text" name="surname" placeholder="Фамилия" required></h3>
        <h3><input type="email" name="email" placeholder="Email" required></h3>
        <h3><input type="password" name="password" placeholder="Пароль" required></h3>
        <h3><button type="submit">Зарегистрироваться</button></h3>
    </form>
</body>
</html>

