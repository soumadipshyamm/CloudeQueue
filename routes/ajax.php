<?php

use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Support\Facades\Route;

Route::as('ajax.')->middleware(['auth', 'verified'])->group(function () {
    Route::controller(AjaxController::class)->group(function () {
        // Route::group(['as' => 'update.'], function () {
        //     Route::match(['put', 'post'], '/updateStatus', 'setStatus')->name('status');
        //     // Route::match(['put', 'post'], '/update/settings', 'updateSettings')->name('settings');
        // });
        Route::group(['as' => 'delete.'], function () {
            Route::delete('/deleteData', 'deleteData')->name('data');
        });
    });
});
