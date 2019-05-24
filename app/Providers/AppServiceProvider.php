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
        $this->bootBladeDirectives();
    }

    private function registerNonProductionProviders()
    {
        if ('production' == app()->environment()) {
            return;
        }

        $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
    }

    private function bootBladeDirectives()
    {
        /*
         * Cards
         */
        Blade::component('components.cards.base', 'card');
        Blade::component('components.cards.body', 'cardbody');
        Blade::component('components.cards.footer', 'cardfooter');
        Blade::include('components.cards.header', 'cardheader');

        /*
         * Buttons
         */
        Blade::include('components.buttons.base', 'buttonbase');
        Blade::include('components.buttons.new', 'buttonnew');
        Blade::include('components.buttons.edit', 'buttonedit');
        Blade::include('components.buttons.destroy', 'buttondestroy');
        Blade::include('components.buttons.link', 'buttonlink');
        Blade::include('components.buttons.submit', 'buttonsubmit');

        /*
         * Misc.
         */
        Blade::include('components.misc.breadcrumb', 'breadcrumb');
    }
}
