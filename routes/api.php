<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Clinic\ClinicController;
use App\Http\Controllers\Api\Doctor\DoctorController;
use App\Http\Controllers\Api\Patient\PatientController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('/sign-up', 'signUp');
    Route::post('/otp_verification', 'otpVerification');
    // Route::post('/resend-otp', 'resendOtp');
    Route::post('/sign-in', 'login');
    Route::post('/generate-otp', 'generateOtp');
    Route::post('/login-phone-number', 'loginOtp');
    Route::post('/login-email-password', 'loginEmailPassword');
    Route::post('forgot-password', 'forgotPassword');
});
Route::middleware('auth:api')->group(function () {
    Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
        Route::post('/logout', 'logout');
        // Route::post('update-profile', 'updateProfile');
        Route::get('/show-profile', 'showProfile');
    });
    Route::controller(ClinicController::class)->prefix('clinic')->as('clinic.')->group(function () {
        Route::get('/show-profile', 'showProfile');
    });
    Route::controller(PatientController::class)->prefix('patient')->as('patient.')->group(function () {
        Route::post('/add-family-member', 'addFamilyMember');
        Route::get('/show-profile', 'showProfile');
    });
    Route::controller(DoctorController::class)->prefix('doctor')->as('doctor.')->group(function () {
        Route::get('/show-profile', 'showProfile');
    });
});
