<?php

namespace App\Http\Middleware;

use Closure;
use App;

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
        if (!$request->secure() && !App::environment('local')) {
            return redirect()->secure($request->path());
        } else {
            return $next($request);
        }
    }
}
