@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пост</title>
    <style>
        body{
            background-image: url('{{ asset('images/createPost.jpg') }}');
            background-size: cover;
            color: white;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .overlay{
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .nav{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div><h1> {{ $post->title }} </h1></div>
        <div>{{ $post->content }} </div>
        <div>
            @if($post->photo)
            <img src="{{ asset('storage/photos/' . $post->photo) }}" style="max-width:300px;">
            @endif
        </div>
    </div>
    <div class="nav">
        <div>
            <button class="btn btn-success mt-3"><a href="{{ route('post.edit', $post->id) }}">Изменить</a></button>
        </div>
        <div>
            <form action="{{ route('post.delete', $post->id )}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Удалить" class="btn btn-danger">
            </form>
        </div>
        <div>
            <button class="btn btn-success mt-3"><a href="{{ route('post.index') }}">Вернуться</a></button>
        </div>
    </div>
</body>
</html>

@endsection
