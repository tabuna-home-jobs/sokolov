<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
            'routes' => $routes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($seoUrl)
    {
        $seoUrl = base64_decode($seoUrl);
        $meta = SEO::where('route', $seoUrl)
            ->where('lang', 'ru')
            ->first();
        $metaEn = SEO::where('route', $seoUrl)
            ->where('lang', 'en')
            ->first();

        return view('dashboard.seo.edit', [
            'meta' => $meta,
            'seoUrl' => $seoUrl,
            'metaEn' => $metaEn,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seoUrl)
    {
        $seoUrl = base64_decode($seoUrl);

        /*
         * Русская
         */
        $meta = SEO::where('route', $seoUrl)
            ->where('lang', 'ru')
            ->first();

        if (is_null($meta)) {
            $attr = $request->all();
            $attr['route'] = $seoUrl;
            $attr['url'] = $seoUrl;
            $attr['lang'] = 'ru';
            SEO::create($attr);
        } else {
            $attr = $request->all();
            $meta->fill($attr)->save();
        }

        /*
        * Английская
        */
        $metaEn = SEO::where('route', $seoUrl)
            ->where('lang', 'en')
            ->first();

        if (is_null($metaEn)) {
            $attr['title'] = $request->input('title-en');
            $attr['description'] = $request->input('description-en');
            $attr['keywords'] = $request->input('keywords-en');
            $attr['robots'] = $request->input('robots-en');
            $attr['route'] = $seoUrl;
            $attr['url'] = $seoUrl;
            $attr['lang'] = 'en';
            SEO::create($attr);
        } else {
            $attr['title'] = $request->input('title-en');
            $attr['description'] = $request->input('description-en');
            $attr['keywords'] = $request->input('keywords-en');
            $attr['robots'] = $request->input('robots-en');
            $attr['route'] = $seoUrl;
            $attr['url'] = $seoUrl;
            $attr['lang'] = 'en';
            $metaEn->fill($attr)->save();
        }

        Session::flash('good', 'Вы успешно добавили значения');

        return redirect()->back();
    }
}
