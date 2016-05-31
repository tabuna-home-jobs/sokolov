<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Carbon\Carbon;
use Closure;
use Config;
use Session;

class Language
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (!is_null(Auth::user()->utc) && !empty(Auth::user()->utc)) {
                Config::set('app.timezone', Auth::user()->utc);
            }
        }

        $lang = Session::get('lang');

        if (!is_null($lang)) {
            App::setLocale($lang);
        } elseif (!is_null($request->server->get('HTTP_ACCEPT_LANGUAGE'))) {
            $langRequest = substr($request->server->get('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($langRequest != 'ru' || $langRequest != 'en') {
                $langRequest = 'en';
            }

            Session::put('lang', $langRequest);
            App::setLocale($langRequest);
        }

        //Устанавливаем локализацию для формитирования дат
        Carbon::setLocale(App::getLocale());

        return $next($request);
    }
}
