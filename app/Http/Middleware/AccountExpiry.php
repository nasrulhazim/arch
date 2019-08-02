<?php

namespace App\Http\Middleware;

use Closure;

class AccountExpiry
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
        if (now()->greaterThan(auth()->user()->account_expired_at)) {
            auth()->logout();

            throw new \App\Exceptions\ExpiredAccountException();
        }

        return $next($request);
    }
}
