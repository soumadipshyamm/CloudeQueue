<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Clinic\ClinicController;
use App\Http\Controllers\DoctorAssigne\doctorAssigneController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\Schedule\ScheduleController;
use App\Http\Controllers\Slot\SlotController;
use App\Http\Controllers\Subscription\SubscriptionController;

Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {

    Route::namespace('Admin')->controller(ProfileController::class)->group(function () {
        Route::get('/profile-view', 'profileView')->name('profile.view');
        Route::post('/profile-update', 'profileUpdate')->name('profile.update');
        Route::get('/password-chenge', 'newPassword')->name('password.chenge');
        Route::post('/password-update', 'passwordUpdate')->name('password.update');
    });

    // Dashboard
    Route::controller(DashboardController::class)->prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // Category
    Route::namespace('Category')->prefix('category')->as('category.')->controller(CategoryController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::match(['get', 'post'], '/add', 'add')->name('add');
    });

    // Clinic
    Route::namespace('Clinic')->as('clinic.')->prefix('clinic')->controller(ClinicController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::match(['get', 'post'], '/add', 'add')->name('add');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::get('/details/{uuid}', 'details')->name('details');

        // Staff
        Route::get('/staff/list/{uuid}', 'staffList')->name('staff.list');
        Route::match(['get', 'post'], 'staff/add', 'addStaff')->name('staff.add');
        Route::get('staff/edit/{uuid}', 'staffEdit')->name('staff.edit');
        Route::get('/staff/details/{uuid}', 'staffDetails')->name('staff.details');
        Route::get('/clinic-doctor/{uuid}', 'getClinicDoctor')->name('clinic.doctor');
    });

    // Doctor
    Route::namespace('Doctor')->as('doctor.')->prefix('doctor')->controller(DoctorController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::get('/details/{uuid}', 'details')->name('details');
        Route::match(['get', 'post'], '/add', 'add')->name('add');
        Route::post('/state-by-country', 'getStateByCountry')->name('state.by.country');
        Route::post('/city-by-state', 'getCityByState')->name('city.by.state');
        Route::get('/doctor-clinic/{uuid}', 'getDoctorClinic')->name('doctor.clinic');
    });

    // Patient
    Route::namespace('Patient')->as('patient.')->prefix('patient')->controller(PatientController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::get('/details/{uuid}', 'details')->name('details');
        Route::match(['get', 'post'], '/add', 'add')->name('add');
    });



    // Subscription
    Route::namespace('Subscription')->as('subscription.')->prefix('subscription')->controller(SubscriptionController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::get('/details/{uuid}', 'details')->name('details');
        Route::get('/features/{uuid}', 'features')->name('features');
        Route::match(['get', 'post'], '/add', 'add')->name('add');
    });

    // Doctor Assigne
    // Route::namespace('DoctorAssigne')->as('assigne.')->prefix('assigne')->controller(doctorAssigneController::class)->group(function () {
    //     Route::get('/doctor/list', 'index')->name('list');
    //     Route::match(['get', 'post'], '/doctor/add', 'add')->name('add');
    // });

    // Create User Wise Permissions
    Route::namespace('RolePermission')->as('user-permission.')->prefix('user-permission')->controller(PermissionController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::match(['get', 'post'], '/add', 'add')->name('add');

        Route::get('/permission/{id}', 'permission')->name('permission');
    });

    // Create Role Wise Permissions
    Route::namespace('RolePermission')->as('role-permission.')->prefix('role-permission')->controller(RoleController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::match(['get', 'post'], '/add', 'add')->name('add');

        Route::get('/permission/{id}', 'permission')->name('permission');
    });

    // Schedule
    Route::namespace('Schedule')->as('schedule.')->prefix('schedule')->controller(ScheduleController::class)->group(function () {
        Route::get('/list', 'index')->name('list');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::get('/details/{uuid}', 'details')->name('details');
        Route::match(['get', 'post'], '/add', 'add')->name('add');


        Route::get('/doctor-schedule-list/{uuid}', 'doctorScheduleList')->name('doctorScheduleList');
    });

    // Slot
    Route::namespace('Slot')->as('slot.')->prefix('slot')->controller(SlotController::class)->group(function () {
        Route::get('/list/{sid}/{wid}/{date}', 'index')->name('list');
        Route::match(['get', 'post'], '/add', 'add')->name('add');
        Route::get('/edit/{id}', 'edit')->name('edit');
        // Route::get('/edit', 'edit')->name('edit');
        Route::get('/details/{uuid}', 'details')->name('details');

        // Route::get('/permission/{id}', 'permission')->name('permission');
    });
});
