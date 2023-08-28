<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ApplyJobController;
use App\Http\Controllers\Frontend\Company\JobController;
use App\Http\Controllers\Frontend\Company\CandidateController;
use App\Http\Controllers\Frontend\Company\JobCandidateController;
use App\Http\Controllers\Frontend\Company\CompanyProfileController;
use App\Http\Controllers\Frontend\Employee\EmployeeSkillController;
use App\Http\Controllers\Frontend\Employee\EmployeeProfileController;
use App\Http\Controllers\Frontend\Employee\EmployeeLanguageController;
use App\Http\Controllers\Frontend\Employee\EmployeeEducationController;
use App\Http\Controllers\Frontend\Employee\EmployeeExperienceController;


Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
    });

    Route::middleware(['employee'])->group(function () {

        Route::prefix('applications')->name('applications.')->controller(ApplyJobController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{job}', 'apply')->name('apply');
            Route::get('/{job}/cancel', 'cancel')->name('cancel');
        });

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

    Route::middleware(['company'])->group(function () {

        Route::controller(CompanyProfileController::class)->prefix('company')->name('company.')->group(function () {
            Route::put('/', 'update')->name('update');
        });

        Route::controller(JobController::class)->prefix('jobs')->name('jobs.')->group(function () {

            Route::controller(JobController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{job}/edit', 'edit')->name('edit')->middleware('companyJob');
                Route::put('/{job}', 'update')->name('update')->middleware('companyJob');
                Route::delete('/{job}', 'destroy')->name('destroy')->middleware('companyJob');
            });

            Route::controller(JobCandidateController::class)->middleware('companyJob')->name('candidates.')->group(function () {
                Route::get('/{job}/candidates', 'index')->name('index');
                Route::get('/{job}/candidates/{employee}/accept', 'acceptPage')->name('accept');
                Route::post('/{job}/candidates/{employee}/accept', 'accept')->name('accept.store');
                Route::get('/{job}/candidates/{employee}/reject', 'reject')->name('reject');
            });

            Route::controller(CandidateController::class)->middleware('employeeJob')->name('candidate.')->group(function () {
                Route::get('/{job}/candidates/{employee}/profile', 'profile')->name('profile');
                Route::get('/{job}/candidates/{employee}/skills', 'skills')->name('skills');
                Route::get('/{job}/candidates/{employee}/education', 'education')->name('education');
                Route::get('/{job}/candidates/{employee}/experiences', 'experiences')->name('experiences');
                Route::get('/{job}/candidates/{employee}/languages', 'languages')->name('languages');
                Route::get('/{job}/candidates/{employee}/cv', 'downloadCv')->name('download_cv');
            });
        });
    });
});
