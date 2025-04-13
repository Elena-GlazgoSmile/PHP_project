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
            background-color: rgb(19, 19, 19);
            background-size: cover;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

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
        <button><a href="{{ route('profile.show', 1) }}" >Профиль</a></button>
    </nav>
</body>
</html>
