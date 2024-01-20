<?php

use App\Http\Controllers\Clinic\ClinicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('admin.dashboard.index');
//     // return view('auth.login');
//     return view('auth.forgotPassword');
// });

Route::get('/', function () {
    return redirect(route('login'));
});
