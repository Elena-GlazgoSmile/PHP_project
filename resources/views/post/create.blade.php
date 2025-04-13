@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value={{  old('title') }}>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror('title')
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Content" value={{  old('content') }}></textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror('content')
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Image"  value={{  old('image') }}>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror('image')
            </div>
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach ($categories as $category)
                <option {{ old('category_id') ==$category->id ? "selected" : ''}}
                value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <div>
                <button type="submit" class="btn btn-primary mt-3">Create</button>
            </div>
        </form>
    </div>
@endsection
