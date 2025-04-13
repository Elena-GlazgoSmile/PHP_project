<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>Document</title>
    <style>
        body {
            background-image: url('{{ asset('images/main2.jpg') }}');
            background-size: cover;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: flex-end;
            align-items: center; /

        }
        .nav {
            padding: 20px;
            text-align: center;
        }
        ul {
            list-style-type: none;
        }
        a {
            color: white;
            text-decoration: none;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="d-flex align-items-end flex-column mb-3" style="height: 200px;">
            <div class="p-2"><a href="{{ route('profile/profile')}}"><button type="button" class="btn btn-outline-light"><h4>Мой профиль</h4></button></a></div>
            <div class="p-2"><a href="{{ route('friends') }}"><button type="button" class="btn btn-outline-light"><h4>Друзья</h4></button></a></div>
            <div class="p-2"><a href="{{ route('chats') }}"><button type="button" class="btn btn-outline-light"><h4>Чаты</h4></button></a></div>
            <div class="p-2"><a href="{{ route('settings') }}"><button type="button" class="btn btn-outline-light"><h4>Настройки</h4></button></a></div>
            <div class="p-2"><button type="button" class="btn btn-outline-light"><h4>Выход</h4></button></div>
        </div>
    </nav>
</body>
</html>
