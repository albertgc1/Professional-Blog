<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('/', 'admin.dashboard')->name('dashboard')->middleware('auth');
    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');
});

Auth::routes();
