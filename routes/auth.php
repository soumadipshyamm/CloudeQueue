<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], '/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});
