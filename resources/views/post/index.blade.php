@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Посты</title>
    <style>
        body{
            background-image: url('{{ asset('images/chats2.jpg') }}');
            background-size: cover;
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
    </style>
</head>
<body>

    <div>
        @foreach ($posts as $post)
        <div>
            <h2>
                <a href="{{ route('post.show', $post->id) }}">
            <div class="overlay">{{ $post->title }}</div>
                </a>
            </h2>
        </div>
        @endforeach
    </div>

</body>
</html>
@endsection
