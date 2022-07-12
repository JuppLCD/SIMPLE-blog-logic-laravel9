<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::controller(PostController::class)->name('posts.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/blogs/{post}', 'show')->name('show');

    Route::get('/category/{category}', 'byCategory')->name('byCategory');
    Route::get('/tags/{tag}', 'byTag')->name('byTag');
});
