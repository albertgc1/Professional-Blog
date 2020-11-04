<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate(10);

        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        if($post->isPublished() || auth()->check())
        {
            return view('posts.show', compact('post'));
        }

        abort(404);
    }
}
