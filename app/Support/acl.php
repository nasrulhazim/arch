<?php

/*
 * roles() helper
 */
if (! function_exists('roles')) {
    function roles($guard = 'web')
    {
        return Cache::remember('roles.' . $guard, 10, function () use ($guard) {
            return config('permission.models.role')::with('permissions')->where('guard_name', $guard)->get();
        });
    }
}

/*
 * permissions() helper
 */
if (! function_exists('permissions')) {
    function permissions($guard)
    {
        return Cache::remember('permissions.' . $guard, 10, function () use ($guard) {
            return config('permission.models.permission')::with('roles')->where('guard_name', $guard)->get();
        });
    }
}

/*
 * Get Role by Name
 */
if (! function_exists('role')) {
    function role($name)
    {
        return Cache::remember('role_' . $name, 10, function () use ($name) {
            return config('permission.models.role')::findByName($name);
        });
    }
}

/*
 * Get Permission by Name
 */
if (! function_exists('permission')) {
    function permission($name)
    {
        return Cache::remember('permission_' . $name, 10, function () use ($name) {
            return config('permission.models.permission')::findByName($name);
        });
    }
}
