<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware('auth');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('auth');
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->middleware('auth');



