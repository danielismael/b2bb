<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDealer\Auth\AuthUserDealerController;
use App\Http\Controllers\UserDealer\UserDealerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('dealer')->group(function() {
    Route::controller(UserDealerController::class)->group(function() {
        Route::get('/user', 'getAll')->name('user.getAll');
        Route::get('/user/{id}', 'getById')->name('user.getById');
        Route::get('/profile', 'profile')->name('user.profile');
        Route::post('/user/create', 'create')->name('user.create');
    });
});

Route::prefix('dealer')->group(function() {
   Route::post('/login', [AuthUserDealerController::class, 'login'])->name('login');
});
