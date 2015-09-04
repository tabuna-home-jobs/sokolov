<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Request;
use Route;
use Session;
use URL;

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
