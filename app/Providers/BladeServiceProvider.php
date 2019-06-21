<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        $this->bootBladeDirectives();
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

        /*
         * Trix.
         */
        Blade::include('components.trix.asset', 'trixasset');
        Blade::include('components.trix.editor', 'trixeditor')
    }
}
