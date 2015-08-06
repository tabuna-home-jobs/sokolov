<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use URL;

class Language
{


    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
