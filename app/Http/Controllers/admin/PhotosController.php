<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Photo;
use App\Http\Controllers\Controller;
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

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('flash', 'Foto eliminada correctamente.');
    }
}
