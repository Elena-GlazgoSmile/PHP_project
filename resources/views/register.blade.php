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
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            background-image: url('{{ asset('images/registr.jpg') }}');
            background-size: cover;
            text-align: center;

        }
        form {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
        }
        h1, h3 {
            color: white;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <form method="POST" action="{{ route('registerCreate') }}">
        @csrf
        <h1>Создать новый аккаунт</h1>
        <h3><input type="text" name="name" placeholder="Имя" required></h3>
        <h3><input type="text" name="surname" placeholder="Фамилия" required></h3>
        <h3><input type="email" name="email" placeholder="Email" required></h3>
        <h3><input type="password" name="password" placeholder="Пароль" required></h3>
        <button type="submit"  class="btn btn-success"><h3>Зарегистрироваться</h3></button>
    </form>
</body>
</html>

