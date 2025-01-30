<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;

Route::get('/', [BlogController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authentication']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/home', function () {
    return view('back.home');
})->middleware('auth')->name('home');

Route::resource('/categories', CategoriesController::class);
Route::resource('/tag', TagController::class);
Route::get('/post/tampil_delete', [PostController::class, 'tampil_delete'])->name('post.tampil_delete');
Route::get('/post/restore/{id}', [PostController::class, 'restore'])->name('post.restore'); 
Route::delete('/post/kill/{id}', [PostController::class, 'kill'])->name('post.kill'); 
Route::resource('/post', PostController::class);
Route::resource('/user', UserController::class);

Route::get('/isi-post/{slug}', [BlogController::class, 'isi_blog'])->name('blog.isi');
Route::get('/list-post', [BlogController::class, 'list_blog'])->name('blog.list');
Route::get('/list-categories/{categories}', [BlogController::class, 'list_categories'])->name('blog.categories');
Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
