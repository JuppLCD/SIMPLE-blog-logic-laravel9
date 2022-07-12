<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyAuthController;

Route::controller(MyAuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'viewRegister')->name('viewRegister');
        Route::post('/register', 'register')->name('register');

        Route::get('/login', 'viewLogin')->name('viewLogin');
        Route::post('/login', 'login')->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});
