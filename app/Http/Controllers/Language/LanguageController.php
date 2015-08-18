<?php

namespace App\Http\Controllers\Language;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class LanguageController extends Controller
{

    public function show($lang = 'en')
    {
        Session::put('lang', $lang);
        App::setLocale($lang);
        return redirect()->back();
    }

}
