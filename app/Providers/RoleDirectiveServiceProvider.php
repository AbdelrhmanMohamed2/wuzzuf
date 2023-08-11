<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RoleDirectiveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('admin', function () {
            return "<?php if(auth()->check() && auth()->user()->IsAdmin()): ?>";
        });

        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('employee', function () {
            return "<?php if(auth()->check() && auth()->user()->IsEmployee()): ?>";
        });

        Blade::directive('endemployee', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('company', function () {
            return "<?php if(auth()->check() && auth()->user()->IsCompany()): ?>";
        });

        Blade::directive('endcompany', function () {
            return "<?php endif; ?>";
        });
    }
}
