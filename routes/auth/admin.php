<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');

    Route::resource('posts', PostController::class);

    //* All users see the index
    Route::resource('categories', CategoryController::class)->only('index');
    Route::resource('tags', TagController::class)->only('index');

    //* Only the Admins
    Route::resource('categories', CategoryController::class)->except(['show', 'index'])->middleware('isAdmin');
    Route::resource('tags', TagController::class)->except(['show', 'index'])->middleware('isAdmin');
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->middleware('isAdmin');
});
