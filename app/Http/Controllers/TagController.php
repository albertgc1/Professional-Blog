<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return view('welcome', [
            'posts' => $tag->posts()->paginate(10),
            'filter' => $tag->name,
            'type' => 'Etiqueta'
        ]);
    }
}
