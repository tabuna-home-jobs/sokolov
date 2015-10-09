<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->checkRole('admin'))
            return $next($request);
        else
            abort(404);
    }
}
