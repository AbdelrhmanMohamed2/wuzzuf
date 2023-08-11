<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::composer('*', function ($view) {
        //     $settings = Setting::get()->pluck('value', 'key')->toArray();
        //     $view->with('settings', (object) $settings);
        // });
        $settings = Setting::get();
        View::share('settings',$settings);
    }
}
