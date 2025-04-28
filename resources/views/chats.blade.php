<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Мои диалоги</h1>

<ul>
    @foreach($chats as $chat)
        <li>
            <a href="{{ route('chat.show', ['chat' => $chat->id]) }}">
                Диалог №{{ $chat->id }}
                @if($chat->users)
                    @foreach($chat->users as $user)
                        <span>{{ $user->name }}</span>
                    @endforeach
                @endif
            </a>
        </li>
    @endforeach
</ul>


</body>
</html>
