<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заставка</title>
    @vite(['resources/sass/app.scss'])
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('{{ asset('images/ground1.jpg') }}');
            background-size: cover;
            color: white;
            text-align: center;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            font-size: 3rem;
            margin: 0;
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>Добро пожаловать на наш сайт!</h1>
        <p>Скоро здесь будет много интересного.</p>
    </div>
</body>
</html>
