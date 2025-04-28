<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>Чат</title>
    <style>
        body{
            padding: 10px;
            background-image: url('{{ asset('images/chat.jpg') }}');
            background-size: cover;

            text-align: center;
        }
        .overlay {
            margin-bottom: 100px;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .over {
            margin-bottom: 100px;
            background: rgba(0, 0, 0, 1);
            padding: 20px;
            border-radius: 10px;
            color: white;
            display: flex;
            justify-content:center;
            align-items: center;
        }
        p{
            padding: 10px;
        }
        h2{
            color:white;
        }
        .but{

            padding: 10px;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Мой чат</h2>
<div class="overlay">
    <div class="messages">
        @foreach($messages as $message)
            <div>
                <strong><h2>{{ $message->sender->name ?? 'Пользователь' }}</h2></strong>
                <div class ="over">
                    <h3><p>{{ $message->content }}</p></h3>
                    <p>{{ $message->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send', ['chat' => $chatId]) }}" method="POST">
        @csrf
        <input type="hidden" name="sender_id" value="{{ $user->id }}">
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        <div class="but">
            <button type="submit" class="btn btn-danger">Отправить</button>
            <button class="btn btn-danger"><a href="{{route('users.index')}}">Вернуться</a></button>
        </div>
    </form>
</div>
</body>
</html>
