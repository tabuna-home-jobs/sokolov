<?php

namespace App\Http\Controllers\Language;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Session;

class LanguageController extends Controller
{

    public function show($lang = 'en')
    {
        Session::put('lang', $lang);


        /*
        if (Auth::check()) {
            Auth::user()->lang = $lang;
            Auth::user()->save();
        }
        */

        App::setLocale($lang);
        return redirect("/");
    }

}
