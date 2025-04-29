@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>О нас</title>
    <style>
        body{
            background-image: url('{{asset('images/welcomeGround.jpg')}}');
            background-size: cover;
            display: flex;
            justify-content: inherit;
            text-align: center;
        }
        p, h1{
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <h1>Здесь могла бы быть моя реклама</h1>
        <p>Но я хочу оставить что-то хорошее после себя</p>
        <p>Так что вот немного мемов(возможно со временем их станет больше):</p>
        <img src="{{ asset('images\5226949550143566149.jpg') }}" style="width: 1000px; height: 1000px; object-fit: cover; margin-right: 20px;">
        <img src="{{ asset('images\5226949550143566152.jpg') }}" style="width: 1000px; height: 1000px; object-fit: cover; margin-right: 20px;">
        <img src="{{ asset('images\5226949550143566157.jpg') }}" style="width: 1000px; height: 1000px; object-fit: cover; margin-right: 20px;">
        <img src="{{ asset('images\5226949550143566158.jpg') }}" style="width: 1000px; height: 1000px; object-fit: cover; margin-right: 20px;">
    </div>
</body>
</html>

@endsection
