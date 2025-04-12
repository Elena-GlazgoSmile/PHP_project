@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="{{ $post->image }}">
            </div>
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach ($categories as $category)
                <option
                    {{ $category->id === $post->category_id ? 'selected' : ''}}

                value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </div>
        </form>
    </div>
@endsection
