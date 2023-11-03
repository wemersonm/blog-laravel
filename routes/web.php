<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/post/{post:SlugPost}', [PostController::class,'show'])->name('post.show');  


Route::get('/user/{user:Username}',[UserController::class, 'show'])->name('user.show');


Route::fallback(function () {
    return view('errors.404');
});
