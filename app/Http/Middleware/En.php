<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Carbon\Carbon;
use Closure;
use Config;
use Session;

class En
{

    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            if (!is_null(Auth::user()->utc) && !empty(Auth::user()->utc))
                Config::set('app.timezone', Auth::user()->utc);

        }

        Session::put('lang', 'en');
        App::setLocale('en');
        //Устанавливаем локализацию для формитирования дат
        Carbon::setLocale(App::getLocale());


        return $next($request);
    }
}
