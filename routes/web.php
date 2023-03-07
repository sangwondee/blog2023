<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Auth
Route::match(['get', 'post'],'/register', [AuthController::class, 'register'])
    ->name('register')
    ->middleware('guest');

Route::match(['get', 'post'],'/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Post
Route::resource('posts', PostController::class)->except(['index'])->middleware('auth');
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
