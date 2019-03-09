<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Update config to be based on database, if any.
 */
class ConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get database config
        // update config()
        return $next($request);
    }
}
