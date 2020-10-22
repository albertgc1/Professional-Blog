<?php

use App\Http\Controllers\admin\PhotosController;
use App\Http\Controllers\Admin\PostsController;
//use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [PostController::class, 'index'])->name('posts.index');
//Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('test', [TestController::class, 'index']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('posts', [PostsController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}/edit', [PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [PostsController::class, 'update'])->name('admin.posts.update');

    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');
});

Auth::routes();
