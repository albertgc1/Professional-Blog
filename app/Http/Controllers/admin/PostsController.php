<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = Post::create([
            'title' => $request->title,
            'url' => Str::slug($request->title)
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->published_at = $request->published_at;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags);

        return back()->with('flash', 'Tu publicación ha sido actualizada');
    }
}
