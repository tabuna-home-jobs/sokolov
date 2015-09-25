<?php

namespace App\Http\Middleware;

use App;
use Carbon\Carbon;
use Closure;
use Session;

class Language
{


    public function handle($request, Closure $next)
    {

        $lang = Session::get('lang', null);

        if (!is_null($lang)) {
            App::setLocale($lang);
        } elseif (!is_null($request->server->get('HTTP_ACCEPT_LANGUAGE'))) {
            $langRequest = substr($request->server->get('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            Session::put('lang', $langRequest);
            App::setLocale($langRequest);
        }
        //Устанавливаем локализацию для формитирования дат
        Carbon::setLocale(App::getLocale());

        return $next($request);
    }
}
