<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('welcome', [
            'posts' => $category->posts()->paginate(10),
            'category' => $category->name
        ]);
    }
}
