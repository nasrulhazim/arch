<?php

/*
 * Check environment status
 */
if (! function_exists('isProduction')) {
    function isProduction()
    {
        return 'production' == app()->environment();
    }
}

/*
 * Check environment status
 */
if (! function_exists('isTesting')) {
    function isTesting()
    {
        return 'testing' == app()->environment();
    }
}
