<?php

/*
 * Check Is Impersonate Enabled
 */
if (! function_exists('isImpersonateEnabled')) {
    function isImpersonateEnabled(): bool
    {
        if(isProduction()) {
            return false;
        }

        return config('laravel-impersonate.enabled') ?? false;
    }
}

/*
 * Check Is Mail Enabled
 */
if (! function_exists('isMailEnabled')) {
    function isMailEnabled(): bool
    {
        return config('mail.enabled') ?? false;
    }
}

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

/*
 * Get gravatar image if any.
 */
if (! function_exists('gravatar')) {
    function gravatar($size = 36)
    {
        return 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?s=' . $size;
    }
}

/*
 * Get authenticated user object.
 */
if (! function_exists('user')) {
    function user($guard = 'web')
    {
        return auth()->guard($guard)->user();
    }
}
