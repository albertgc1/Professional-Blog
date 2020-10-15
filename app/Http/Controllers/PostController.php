<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published_at')->get();

        return view('posts.index', compact('posts'));
    }
}
