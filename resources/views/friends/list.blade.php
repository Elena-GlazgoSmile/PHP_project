<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои друзья</title>
    <style>
        body{
            padding: 10px;
            background-image: url('{{ asset('images/friends.jpg') }}');
            text-align: center;
        }
        .user-card{
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
        }
        h2, h4, p{
            color:white;
        }
        a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <h2>Все пользователи</h2>
<div class="users-list">
@foreach($users as $userItem)
    <div class="user-card" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; display: flex; align-items: center;">
        <img src="{{ asset('storage/' . $userItem->profile_picture) }}" alt="Аватар" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-right: 20px;">
        <div>
            <h4>{{ $userItem->fullName() }}</h4>
            <p>{{ $userItem->bio }}</p>
        </div>
        <div style="margin-left:auto;">
            @if(in_array($userItem->id, $friendIds))
                <a href="{{ route('friends.remove', $userItem->id) }}" class="btn btn-danger">Удалить из друзей</a>
            @else
                <form method="POST" action="{{ route('friends.add') }}" style="display:inline;">
                    @csrf
                    <input type="hidden" name="friend_id" value="{{ $userItem->id }}">
                    <button type="submit" class="btn btn-success">Добавить в друзья</button>
                </form>
            @endif
        </div>

    </div>
@endforeach
<button class="btn btn-success"><a href="{{ route('profile.show', Auth::user()->id) }}">Вернуться</a></button>
</div>
</body>
</html>
