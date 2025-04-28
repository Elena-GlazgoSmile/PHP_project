<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Диалог #{{ $chat->id }}</h1>

<div class="messages">
    @foreach($chat->messages as $message)
        <div class="message">
            <strong>{{ $message->sender->name ?? 'Аноним' }}:</strong>
            <p>{{ $message->content }}</p>
            <small>{{ $message->created_at->format('H:i') }}</small>
        </div>
    @endforeach
</div>

<form action="{{ route('chat.send', ['chat' => $chat->id]) }}" method="POST">
    @csrf
    <textarea name="content"></textarea>
    <input type="hidden" name="sender_id" value="{{ $user }}">
    <button type="submit">Отправить</button>
</form>


</body>
</html>
