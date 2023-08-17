<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Search\JobSearchController;
use App\Http\Controllers\Admin\CareerLevelController;
use App\Http\Controllers\Admin\CompanySizeController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Search\CompanySearchController;
use App\Http\Controllers\Search\EmployeeSearchController;


Route::prefix('dashboard')->middleware(['auth', 'admin'])->name('dashboard.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'index'])->name('login-page')->withoutMiddleware(['auth', 'admin'])->middleware('guest');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login')->withoutMiddleware(['auth', 'admin'])->middleware('guest');

    Route::get('/index', [DashboardController::class, 'index'])->name('index');

    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

    Route::prefix('admins')->controller(AdminController::class)->name('admins.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{admin}/edit', 'edit')->name('edit');
        Route::put('/{admin}', 'update')->name('update');
        Route::delete('/{admin}', 'destroy')->name('destroy');
    });

    Route::prefix('posts')->controller(PostController::class)->name('posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{post}', 'show')->name('show');
        Route::get('/{post}/edit', 'edit')->name('edit');
        Route::put('/{post}', 'update')->name('update');
        Route::delete('/{post}', 'destroy')->name('destroy');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::delete('posts/{post}/comments/{comment}', 'destroy')->name('comments.destroy')->middleware('commentPost');
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
        Route::get('/', 'index')->name('index');
        Route::get('companies/{company}/jobs', 'companyJobs')->name('company_jobs');
        Route::get('/{company}/jobs/{job}', 'show')->name('show')->middleware(['companyJob']);
    });

    Route::prefix('locations')->controller(LocationController::class)->name('locations.')->withoutMiddleware(['auth', 'admin'])->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create/country', 'create')->name('create.country');
        Route::get('/create/city', 'create')->name('create.city');
        Route::get('/create/area', 'create')->name('create.area');

        Route::post('/country', 'storeCountry')->name('store.country');
        Route::post('/city', 'storeCity')->name('store.city');
        Route::post('/area', 'storeArea')->name('store.area');

        Route::get('/{location}/edit', 'edit')->name('edit');
        Route::put('/{location}', 'update')->name('update');
        Route::delete('/{location}', 'destroy')->name('destroy');

        Route::get('/countries', 'getCountries')->name('countries');
        Route::get('/{location}/cities', 'getCities')->name('cities');
        Route::get('/{location}/areas', 'getAreas')->name('areas');
    });

    Route::prefix('jobTypes')->controller(JobTypeController::class)->name('jobTypes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{jobType}/edit', 'edit')->name('edit');
        Route::put('/{jobType}', 'update')->name('update');
        Route::delete('/{jobType}', 'destroy')->name('destroy');
    });

    Route::prefix('careerLevels')->controller(CareerLevelController::class)->name('careerLevels.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{careerLevel}/edit', 'edit')->name('edit');
        Route::put('/{careerLevel}', 'update')->name('update');
        Route::delete('/{careerLevel}', 'destroy')->name('destroy');
    });

    Route::prefix('industries')->controller(IndustryController::class)->name('industries.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{industry}/edit', 'edit')->name('edit');
        Route::put('/{industry}', 'update')->name('update');
        Route::delete('/{industry}', 'destroy')->name('destroy');
    });

    Route::prefix('jobCategories')->controller(JobCategoryController::class)->name('jobCategories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{jobCategory}/edit', 'edit')->name('edit');
        Route::put('/{jobCategory}', 'update')->name('update');
        Route::delete('/{jobCategory}', 'destroy')->name('destroy');
    });

    Route::prefix('companySizes')->controller(CompanySizeController::class)->name('companySizes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{companySize}/edit', 'edit')->name('edit');
        Route::put('/{companySize}', 'update')->name('update');
        Route::delete('/{companySize}', 'destroy')->name('destroy');
    });

    Route::prefix('universities')->controller(UniversityController::class)->name('universities.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{university}/edit', 'edit')->name('edit');
        Route::put('/{university}', 'update')->name('update');
        Route::delete('/{university}', 'destroy')->name('destroy');
    });

    Route::prefix('degrees')->controller(DegreeController::class)->name('degrees.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{degree}/edit', 'edit')->name('edit');
        Route::put('/{degree}', 'update')->name('update');
        Route::delete('/{degree}', 'destroy')->name('destroy');
    });

    Route::prefix('grades')->controller(GradeController::class)->name('grades.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{grade}/edit', 'edit')->name('edit');
        Route::put('/{grade}', 'update')->name('update');
        Route::delete('/{grade}', 'destroy')->name('destroy');
    });

    Route::prefix('skills')->controller(SkillController::class)->name('skills.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{skill}/edit', 'edit')->name('edit');
        Route::put('/{skill}', 'update')->name('update');
        Route::delete('/{skill}', 'destroy')->name('destroy');
    });

    Route::prefix('languages')->controller(LanguageController::class)->name('languages.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{language}/edit', 'edit')->name('edit');
        Route::put('/{language}', 'update')->name('update');
        Route::delete('/{language}', 'destroy')->name('destroy');
    });

    Route::prefix('search')->name('search.')->group(function () {
        Route::get('/jobs/', [JobSearchController::class, 'search'])->name('jobs');
        Route::get('/filter',  [JobSearchController::class, 'filterJobs'])->name('jobs.filter');

        Route::get('/companies/', [CompanySearchController::class, 'search'])->name('companies');
        Route::get('/companies/filter', [CompanySearchController::class, 'filter'])->name('companies.filter');

        Route::get('/employees/filter',  [EmployeeSearchController::class, 'filterEmployees'])->name('employees.filter');
    });

    Route::prefix('settings')->controller(SettingController::class)->name('settings.')->group(function () {
        Route::get('/{type}', 'index')->name('show')->middleware('settingType');
        Route::get('/create/{type}', 'create')->name('create')->middleware('settingType');
        Route::post('/{type}', 'store')->name('store')->middleware('createSettingType');
        Route::put('/{setting}', 'update')->name('update');
        Route::delete('/{setting}/{type}', 'destroy')->name('destroy')->middleware('createSettingType');
    });
});
