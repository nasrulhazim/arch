<?php

/*
 * Get Available Locales
 */
if (! function_exists('locales')) {
    function locales()
    {
        return collect(explode(',', config('app.locales')))->reject(function ($locale) {
            return ! file_exists(resource_path('lang/' . $locale));
        });
    }
}
