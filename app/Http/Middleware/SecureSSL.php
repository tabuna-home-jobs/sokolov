<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class SecureSSL
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
        if( ! $request->secure()) {
            return redirect()->secure($request->path());
        }
        else{
            return $next($request);
        }

    }
}
