<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        return 'llega';
    }
}
