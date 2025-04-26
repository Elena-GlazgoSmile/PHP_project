<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои друзья</title>
</head>
<body>
    <h2>Мои друзья</h2>
    <ul>
    @foreach($friends as $friend)
        <li>
            {{ $friend->name }} ({{ $friend->email }})
            <a href="{{ route('friends.remove', $friend->id) }}">Удалить</a>
        </li>
    @endforeach
    </ul>


    <form method="POST" action="{{ route('friends.add') }}">
        @csrf
        <input type="number" name="friend_id" placeholder="ID друга" required>
        <button type="submit">Добавить друга</button>
    </form>
</body>
</html>
