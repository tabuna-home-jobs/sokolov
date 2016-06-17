<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Session;

class SubscribeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null(Subscribe::where('email', $request->email)->first())) {
            Subscribe::create($request->all());
        }

        Session::flash('good', trans('main.subscription-success-text'));

        return redirect()->back();
    }
}
