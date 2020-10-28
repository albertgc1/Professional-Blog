<?php

use App\Http\Controllers\admin\PhotosController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('posts.index');
Route::get('/detail/{post}', [HomeController::class, 'show'])->name('posts.show');
Route::get('category/{category}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('tags/{tag}', [TagController::class, 'index'])->name('tags.index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('posts', [PostsController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}/edit', [PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [PostsController::class, 'update'])->name('admin.posts.update');

    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');
    Route::delete('posts/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');
});

Auth::routes();
