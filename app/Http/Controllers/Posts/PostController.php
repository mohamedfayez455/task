<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\PostRequest;
use App\Jobs\SendMailJob;
use App\Models\Category;
use App\Models\Post ;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('posts.index' , compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create' ,compact('categories'));
    }

    public function store(PostRequest  $request)
    {
        $data = $request->validated();
        if (request('photo'))
        {
            $this->storePhoto(request('photo') , 'posts');
            $data['photo'] =  request('photo')->hashName();
        }
        $post = Post::create($data);
        $job = (new SendMailJob($post))->delay(Carbon::now()->addSeconds(5));
        dispatch($job);
        return redirect()->route('posts.index')->with('success' , 'Post  added successfully');
    }

    public function show(Post $post )
    {
        return view('posts.show' , compact('post'));
    }

    public function edit(Post $post )
    {
        $categories = Category::all();
        return view('posts.edit' , compact('post' , 'categories'));
    }

    public function update(PostRequest  $request, Post $post )
    {
        $data = $request->validated();
        if (request('photo')) {
            $this->updatePhoto( $post->photo ,  request('photo') , 'posts');
            $data['photo'] = request('photo')->hashName();
        }
        $post->update($data);
        $job = (new SendMailJob($post))->delay(Carbon::now()->addSeconds(5));
        dispatch($job);
        return redirect()->route('posts.index')->with('success' , 'Post updated successfully');
    }

    public function destroy(Post $post )
    {
        $this->deletePhoto($post->photo ,'posts');
        $post->delete();
        return redirect()->route('posts.index')->with('success' , 'Post Deleted successfully');
    }
}
