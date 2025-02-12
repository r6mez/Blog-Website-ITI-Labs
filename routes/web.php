<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


Auth::routes();

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

Route::get('/create', [PostsController::class, 'create'])->name('posts.create');

Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');

Route::put('posts/{post}/restore', [PostsController::class, 'restore'])->name('posts.restore');

Route::get('/unauthorized', function () { return view('auth/unauthorized'); })->name('unauthorized');