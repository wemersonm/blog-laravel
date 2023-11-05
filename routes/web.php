<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/post/{post:SlugPost}', [PostController::class,'show'])->name('post.show');  



Route::get('/user/{user:Username}/profile',[UserController::class, 'show'])->name('user.show');
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::post('/user',[UserController::class,'store'])->name('user.store');

Route::get('/auth', [AuthController::class,'index'])->name('auth.index');
Route::post('/auth', [AuthController::class,'store'])->name('auth.store');
Route::get('/logout', [AuthController::class,'destroy'])->name('auth.logout');


Route::get('/category/{category:SlugCategory}/posts',[CategoryController::class,'showPosts'])->name('category.posts');

Route::post('/comment/store',[PostCommentController::class, 'store'])->name('comment.store');

Route::fallback(function () {
    return view('errors.404');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
