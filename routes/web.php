<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Post\CreatePost;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->middleware(['guest'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('home', Home::class)->name('home');
    Route::get('posts/new', CreatePost::class)->name('create-post');
});
