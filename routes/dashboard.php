<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LocationController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->middleware(['auth', 'admin'])->name('dashboard.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login-page')->withoutMiddleware(['auth', 'admin']);
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login')->withoutMiddleware(['auth', 'admin']);

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('admins')->controller(AdminController::class)->name('admins.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{admin}/edit', 'edit')->name('edit');
        Route::put('/{admin}', 'update')->name('update');
        Route::delete('/{admin}', 'destroy')->name('destroy');
    });

    Route::prefix('employees')->controller(EmployeeController::class)->name('employees.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{employee}', 'show')->name('show');
        Route::get('/{employee}/download-cv', 'downloadCv')->name('download-cv');
        Route::get('/{employee}/edit', 'edit')->name('edit');
        Route::put('/{employee}', 'update')->name('update');
        Route::delete('/{employee}', 'destroy')->name('destroy');
    });

    Route::prefix('companies')->controller(CompanyController::class)->name('companies.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{company}', 'show')->name('show');
        Route::get('/{company}/edit', 'edit')->name('edit');
        Route::put('/{company}', 'update')->name('update');
        Route::delete('/{company}', 'destroy')->name('destroy');
    });

    Route::prefix('jobs')->controller(JobController::class)->name('jobs.')->group(function () {
        Route::get('companies/{company}/jobs', 'index')->name('index');
        Route::get('/{company}/jobs/{job}', 'show')->name('show')->middleware(['companyJob']);
    });

    Route::prefix('locations')->controller(LocationController::class)->name('locations.')->group(function () {
        Route::get('/{location}/cities', 'getCities')->name('cities');
        Route::get('/{location}/areas', 'getAreas')->name('areas');
    });
});
