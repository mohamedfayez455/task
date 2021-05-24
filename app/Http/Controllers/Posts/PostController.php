<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\PostRequest;
use App\Post ;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('posts.index' , compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest  $request)
    {
        $data = $request->validated();
        Post::create($data);
        session()->flash('success' , 'added');
        return redirect()->route('posts.index')->with('success' , 'Post  added successfully');
    }

    public function show(Post $post )
    {
        return view('posts.show' , compact('post'));
    }

    public function edit(Post $post )
    {
        return view('posts.edit' , compact('post'));
    }

    public function update(PostRequest  $request, Post $post )
    {
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('posts.index')->with('success' , 'Post updated successfully');
    }

    public function destroy(Post $post )
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success' , 'Post Deleted successfully');
    }
}
