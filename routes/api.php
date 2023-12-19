<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(AuthController::class)->group(function () {
    Route::post('/sign-up', 'signUp');
    Route::post('/otp_verification', 'otpVerification');
    Route::post('/resend-otp-verification', 'resendOtp');
    Route::post('/sign-in', 'login')->name('login');
    Route::post('/generate-otp', 'generateOtp');
    Route::post('/login-phone-number', 'loginOtp');
    Route::post('/login-email-password', 'loginEmailPassword');
});
Route::middleware('auth:api')->group(function () {
    Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
        Route::post('/logout', 'logout');
    });
});
