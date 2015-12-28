<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use SEO;
use Session;

class SeoSaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = SEO::staticGetRoute();
        return view('dashboard.seo.index', [
            'routes' => $routes
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($seoUrl)
    {
        $seoUrl = base64_decode($seoUrl);
        $meta = SEO::where('route', $seoUrl)->first();
        return view('dashboard.seo.edit', [
            'meta' => $meta,
            'seoUrl' => $seoUrl
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seoUrl)
    {
        $seoUrl = base64_decode($seoUrl);
        $meta = SEO::where('route', $seoUrl)->first();

        if (is_null($meta)) {
            $attr = $request->all();
            $attr['route'] = $seoUrl;
            $attr['url'] = $seoUrl;
            SEO::create($attr);
        } else {
            $meta->fill($request->all())->save();
        }


        Session::flash('good', 'Вы успешно добавили значения');
        return redirect()->back();
    }

}
