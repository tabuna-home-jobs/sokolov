<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use URL;
use Session;
use App;
use Request;

class Language
{


    public function handle($request, Closure $next)
    {
        $lang = Session::get('lang', null);

        if(!is_null($lang))
        {
            App::setLocale($lang);
        }

        return $next($request);
    }
}
