<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->middleware(['auth', 'admin'])->name('dashboard.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login-page')->withoutMiddleware(['auth', 'admin']);
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login')->withoutMiddleware(['auth', 'admin']);

    Route::get('/', [DashboardController::class, 'index'])->name('index');
});
