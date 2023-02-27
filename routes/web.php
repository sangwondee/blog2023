<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Post
// แบบใหม่ ทำ crud แบบ Route เดียว
Route::resource('posts', PostController::class)->except(['index']);


// แบบเก่า
// Route::name('posts.')->prefix('posts')->group(function () {

//     Route::get('/posts', [PostController::class, 'index'])->name('index');

//     Route::get('/create', [PostController::class, 'create'])->name('create');
//     Route::post('/', [PostController::class, 'store'])->name('store');

//     Route::get('/{post}', [PostController::class, 'show'])->name('show');

//     Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
//     Route::put('/{post}', [PostController::class, 'update'])->name('update');

//     Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
// });
