<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;

class PostController extends Controller
{
    public function index() {

        $posts=Post::all();
        return view('post.index', compact('posts'));
    }

    public function create() {
        $categories=Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'photo' => 'nullable|file|image|max:2048',
            'image' => 'nullable|string'
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = basename($filePath);

        }

        Post::create($validated);

        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories=Category::all();
        return view('post.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'photo' => 'nullable|file|image|max:2048',
            'image' => 'nullable|string'
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = basename($filePath);
        }

        $post->update($validated);

        return redirect()->route('post.show', $post->id);
    }

    public function delete() {
        $post = Post::withTrashed() -> find(2);
        $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title phpstorm'
        ],[
            'title' => 'some title phpstorm',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'updateorcreate some post',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some imageblabla.jpg',
            'likes' => 500,
            'is_published' => 0,
        ];

        $post=Post::updateOrCreate([
            'title' => 'some title not phpstorm',
        ],[
            'title' => 'some title not phpstorm',
            'content' => 'its not update some content',
            'image' => 'its not update some imageblabla.jpg',
            'likes' => 500,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd(2222);
    }
}
