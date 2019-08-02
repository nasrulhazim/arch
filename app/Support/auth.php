<?php

/**
 * Check if account expiry feature is enabled / disabled.
 */
if (! function_exists('accountExpiryCheckingEnabled')) {
    function accountExpiryCheckingEnabled()
    {
        return config('auth.enable_account_expiry');
    }
}

/*
 * Check if password expiry feature is enabled / disabled.
 */
if (! function_exists('passwordExpiryCheckingEnabled')) {
    function passwordExpiryCheckingEnabled()
    {
        return config('auth.enable_password_expiry');
    }
}

/*
 * Check if user is first time login
 */
if (! function_exists('isFirstTimeLoginCheckingEnabled')) {
    function isFirstTimeLoginCheckingEnabled()
    {
        return config('auth.enable_first_time_login');
    }
}
