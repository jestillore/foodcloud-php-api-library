<?php

namespace Foodcloud\APILibrary;

use Illuminate\Support\ServiceProvider;

class APILibraryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../config/foodcloud.php') => config_path('foodcloud.php')
            ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}