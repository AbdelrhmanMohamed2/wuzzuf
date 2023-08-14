<?php

use App\Http\Controllers\Frontend\Company\CompanyProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\Employee\EmployeeSkillController;
use App\Http\Controllers\Frontend\Employee\EmployeeProfileController;
use App\Http\Controllers\Frontend\Employee\EmployeeEducationController;
use App\Http\Controllers\Frontend\Employee\EmployeeExperienceController;
use App\Http\Controllers\Frontend\Employee\EmployeeLanguageController;


Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
    });

    Route::middleware(['employee'])->group(function () {

        Route::controller(EmployeeProfileController::class)->group(function () {
            Route::put('/', 'update')->name('update');
            Route::get('/cv', 'downloadCv')->name('download_cv');
        });

        Route::controller(EmployeeSkillController::class)->group(function () {
            Route::get('/skills', 'skills')->name('skills');
            Route::post('/skills', 'storeSkill')->name('skills.store');
            Route::delete('/skills/{skill}', 'detachSkill')->name('skills.detach');
        });

        Route::controller(EmployeeEducationController::class)->group(function () {
            Route::get('/education', 'education')->name('education.index');
            Route::put('/education', 'educationUpdate')->name('education.update');
        });
        Route::controller(EmployeeLanguageController::class)->prefix('language')->name('language.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{language}', 'destroy')->name('destroy');
        });

        Route::controller(EmployeeExperienceController::class)->prefix('experiences')->name('experiences.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{experience}/edit', 'edit')->name('edit')->middleware('employeeExperience');
            Route::put('/{experience}', 'update')->name('update')->middleware('employeeExperience');
            Route::delete('/{experience}', 'destroy')->name('destroy')->middleware('employeeExperience');
        });
    });

    Route::middleware(['company'])->prefix('company')->name('company.')->group(function () {
        Route::controller(CompanyProfileController::class)->group(function () {
            Route::put('/', 'update')->name('update');
        });
    });
});
