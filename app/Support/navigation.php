<?php

/*
 * Check if current route is active navigation
 */
if (! function_exists('isActiveNav')) {
    function isActiveNav($route_names)
    {
        return \Illuminate\Support\Str::contains(
        	request()->route()->getName(), 
        	$route_names
        );
    }
}
