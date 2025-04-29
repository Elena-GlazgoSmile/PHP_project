<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>Document</title>
    <style>
        body{
            padding: 10px;
            display: flex;
            justify-content: center;
            text-align: center;
            background-image: url('{{asset('images/chats.jpg')}}');
            background-size: cover;
            color: white;
        }
        li{
            list-style:none;
        }
        .overlay{
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>



<ul>
    <h1>Список пользователей</h1>
    <div class="overlay">
    @foreach($users as $user)
        <li>
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Аватар" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-right: 20px;">
            <h2>{{ $user->name }} {{ $user->surname }}</h2>
            <form action="{{ route('chats.start', ['userId' => $currUser->id, 'currentUserId' => $user->id]) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-success"><h3>Посмотреть</h3></button>
            </form>
        </li>
    @endforeach
    </div>
    <button class="btn btn-success"><a href="{{ route('profile.show', Auth::user()->id) }}">Вернуться</a></button>
</ul>

</body>
</html>
