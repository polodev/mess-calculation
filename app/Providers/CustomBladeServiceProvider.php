<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class CustomBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });

        Blade::if('roles', function ($roles) {
            return auth()->check() && auth()->user()->hasRoles($roles);
        });

        Blade::if('anyRoles', function ($roles) {
            return auth()->check() && auth()->user()->hasAnyRoles($roles);
        });

    }
}





