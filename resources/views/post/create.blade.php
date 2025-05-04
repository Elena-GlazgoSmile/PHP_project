@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h3 for="title">Заголовок</h3>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" value={{  old('title') }}>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror('title')
            </div>
            <div class="form-group">
                <h3 for="photo">Фото</h3>
                <input type="file" name="photo">
                @error('photo')<div>{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <h3 for="content">Контент</h3>
                <textarea class="form-control" name="content" id="content" placeholder="Контент" value={{  old('content') }}></textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror('content')
            </div>
            <div class="form-group">
                <h3 for="image">Картинка</h3>
                <input type="text" class="form-control" name="image" id="image" placeholder="Картинка"  value={{  old('image') }}>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror('image')
            </div>
            <h3 for="category" class="form-label">Категория</h3>
            <select class="form-control" id="category" name="category_id">
                @foreach ($categories as $category)
                <option {{ old('category_id') ==$category->id ? "selected" : ''}}
                value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <div>
                <button type="submit" class="btn btn-success mt-3"><h3>Создать</h3></button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
