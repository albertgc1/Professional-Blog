<?php

use App\Http\Controllers\Admin\UserRolesController;
use App\Http\Controllers\admin\PhotosController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UserController;
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

    Route::resource('posts', PostsController::class, ['as' => 'admin'])->except('show');

    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');
    Route::delete('posts/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');

    Route::resource('users', UserController::class, ['as' => 'admin']);

    Route::put('roles/{user}/update', [UserRolesController::class, 'update'])->name('admin.users.roles.update');
});

Auth::routes();
