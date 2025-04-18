<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss'])
    <title>Профиль пользователя</title>
    <style>
        body {
            background-color: rgb(49, 49, 49);
            display: flex;
            align-items: center;

            text-align: left;
        }
        h4 {
            color: white;
        }
        .overlay{
            padding: 20px;
        }
        .photo{
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 50px;
        }
        .profile-image{
            width: 600px;
            height: 600px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;

        }
        a{
            text-decoration: none;
            color:red;

        }
    </style>
</head>

<body>
    <nav class="photo">
        @if($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="profile-image">
    @else
        <p>Изображение профиля не загружено.</p>
    @endif

    </nav>
    <nav class="overlay">
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            <h4>Пользователь: {{ $user->fullName() }}</h4>
        </div>
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            <h4>О себе: {{$user->bio}}</h4>
        </div>
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            <h4>Электронная почта: {{$user->email}}</h4>
        </div>
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            <h4>Телефон: {{$user->phone}}</h4>
        </div>
        <button class="btn btn-outline-danger"><a href="{{ route('profile.edit', $user->id) }}">Изменить</a></button>
    </nav>
</body>
</html>
