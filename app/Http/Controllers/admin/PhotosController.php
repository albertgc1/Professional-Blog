<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048'
        ]);

        $photo = request()->file('photo')->store('public');

        Photo::create([
            'photo' => Storage::url($photo),
            'post_id' => $post->id
        ]);
    }
}
