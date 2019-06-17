<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        if (in_array(app()->environment(), ['production', 'testing', 'dusk'])) {
            return;
        }

        $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
    }

}
