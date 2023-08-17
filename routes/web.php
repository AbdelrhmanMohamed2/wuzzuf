<?php

use App\Http\Controllers\Frontend\ApplyJobController;
use App\Http\Controllers\Frontend\Blog\BlogController;
use App\Http\Controllers\Frontend\Blog\CommentController;
use App\Http\Controllers\Frontend\Company\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Job\JobController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('jobs')->name('jobs.')->controller(JobController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/recommended', 'recommendedJobs')->name('recommended_jobs');
    Route::get('/{job}', 'show')->name('show');
});

Route::prefix('companies')->name('companies.')->controller(CompanyController::class)->group(function () {
    Route::get('/{company}', 'show')->name('show');
    Route::get('/{company}/jobs', 'jobs')->name('jobs');
});

Route::prefix('applications')->name('applications.')->middleware(['auth', 'employee'])->controller(ApplyJobController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{job}', 'apply')->name('apply');
    Route::get('/{job}/cancel', 'cancel')->name('cancel');
});

Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{post}', 'show')->name('show');
});

Route::name('comments.')->controller(CommentController::class)->group(function () {
    Route::post('/blog/{post}/comments', 'store')->name('store');
    Route::put('/blog/{post}/comments/{comment}', 'update')->name('update')->middleware(['commentPost', 'commentUser']);
    Route::delete('/blog/{post}/comments/{comment}', 'destroy')->name('destroy')->middleware(['commentPost', 'commentUser']);
});

require __DIR__ . '/auth.php';
