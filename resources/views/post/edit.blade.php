@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обновление поста</title>
    <style>
        body{
            background-image: url('{{asset('images/createPosts.jpg')}}');
            background-size: cover;
        }
        .over{
            color:white;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="over">
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <h3 for="title">Заголовок</h3>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <h3 for="content">Контент</h3>
                <textarea class="form-control" name="content" id="content" placeholder="Контент">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <h3 for="image">Картинка</h3>
                <input type="text" class="form-control" name="image" id="image" placeholder="Картинка" value="{{ $post->image }}">
            </div>
            <h3 for="category" class="form-label">Категория</h3>
            <select class="form-control" id="category" name="category_id">
                @foreach ($categories as $category)
                <option
                    {{ $category->id === $post->category_id ? 'selected' : ''}}

                value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <div>
                <button type="submit" class="btn btn-success mt-3">Обновить</button>
            </div>
        </form>
    </div>
</body>
</html>

@endsection
