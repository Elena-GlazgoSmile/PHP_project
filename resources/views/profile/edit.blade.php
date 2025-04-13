<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <style>
        body{
            background-image: url('{{ asset('images/profile_edit.jpg') }}');
            background-size: cover;
            display: flex;
            padding: 20px;
            color: white;
        }
        .block{
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            text-align: right;
            padding: 20px;
        }
        a{
            text-decoration: none;
            color: black;

        }
        .but{
            padding: 20px;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <nav class="block">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"><h3>Имя</h3></label>
                <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="surname"><h3>Фамилия</h3></label>
                <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{ $user->surname }}" required>
            </div>
            <div class="form-group">
                <label for="bio"><h3>О себе</h3></label>
                <textarea name="bio" class="form-control" placeholder="О себе">{{ $user->bio }}</textarea>
            </div>
            <div class="form-group">
                <label for="email"><h3>Электронная почта</h3></label>
                <input type="email" name="email" class="form-control" placeholder="Почта" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone"><h3>Телефон</h3></label>
                <input type="text" name="phone" class="form-control" placeholder="Телефон" value="{{ $user->phone }}">
            </div>
            <div class="form-group">
                <label for="profile_picture"><h3>Фотография</h3></label>
                <input type="file" name="profile_picture" class="form-control">
            </div>
            <nav class="but">
                <div class="form-group">
                        <button type="submit" class="btn btn-light"><h3>Сохранить изменения</h3></button>
                </div>
            </nav>
            <nav class="but">
                <div class="form-group">
                        <button class="btn btn-light">
                            <a href="{{ route('profile.show', $user->id) }}">
                                <h3>Вернуться</h3>
                            </a>
                        </button>
                </div>
            </nav>
    </form>
    </nav>
</body>
</html>
