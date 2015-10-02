<?php

namespace App\Http\Controllers\Language;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;

class LanguageController extends Controller
{

    public function show($lang = 'en')
    {
        Session::put('lang', $lang);
        App::setLocale($lang);
        return redirect("/");
    }

}
