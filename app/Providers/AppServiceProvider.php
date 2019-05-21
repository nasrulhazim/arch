<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->registerNonProductionProviders();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }

    private function registerNonProductionProviders()
    {
        if ('production' == app()->environment()) {
            return;
        }

        $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
    }
}
