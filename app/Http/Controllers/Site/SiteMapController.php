<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\News;
use App\Models\Page;
use Config;
use URL;

class SiteMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sitemap = App::make("sitemap");
        $sitemap->setCache('laravel.sitemap', 3600);

        if (!$sitemap->isCached()) {
            $sitemap->add(URL::to('/'), date('c', time()), '1.0', 'daily');
            $sitemap->add(URL::to('/catalog'), date('c', time()), '1.0', 'daily');
            $sitemap->add(URL::to('/review'), date('c', time()), '1.0', 'daily');
            $sitemap->add(URL::to('/feedback'), date('c', time()), '1.0', 'daily');

            $posts = Page::orderBy('created_at', 'desc')->get();
            foreach ($posts as $post) {
                $sitemap->add(Config::get('app.url') . '/page/' . $post->slug, $post->updated_at);
            }


            $news = News::orderBy('created_at', 'desc')->get();
            foreach ($news as $new) {
                $sitemap->add(Config::get('app.url') . '/page/' . $new->slug, $new->updated_at);
            }


        }

        return $sitemap->render('xml');

    }


}
