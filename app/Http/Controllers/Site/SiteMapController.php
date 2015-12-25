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

    public $URL;


    public function __construct()
    {
        $this->URL = Config::get('app.url');
    }

    static function NotFound()
    {
        $URL = Config::get('app.url');

        $main = collect();

        $main->push([
            'name' => 'Главная',
            'url' => URL::to($URL . '/')
        ])->push([
            'name' => 'Каталог',
            'url' => URL::to($URL . '/catalog')
        ])->push([
            'name' => 'Отзывы',
            'url' => URL::to($URL . '/review')
        ])->push([
            'name' => 'Обратная связь',
            'url' => URL::to($URL . '/feedback')
        ]);


        $posts = Page::where('lang', App::getLocale())->orderBy('created_at', 'desc')->get();
        $postCollect = collect();
        foreach ($posts as $post) {
            $postCollect->push([
                'name' => $post->name,
                'url' => URL::to($URL . '/page/' . $post->slug)
            ]);
        }

        $news = News::where('lang', App::getLocale())->orderBy('created_at', 'desc')->get();
        $newsCollect = collect();
        foreach ($news as $new) {
            $newsCollect->push([
                'name' => $new->name,
                'url' => URL::to($URL . '/page/' . $new->slug)
            ]);
        }


        return response()->view('errors.404', [
            'main' => $main,
            'news' => $newsCollect,
            'pages' => $postCollect,
        ]);


    }

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
            $sitemap->add(URL::to($this->URL . '/'), date('c', time()), '1.0', 'daily');
            $sitemap->add(URL::to($this->URL . '/catalog'), date('c', time()), '1.0', 'daily');
            $sitemap->add(URL::to($this->URL . '/review'), date('c', time()), '1.0', 'daily');
            $sitemap->add(URL::to($this->URL . '/feedback'), date('c', time()), '1.0', 'daily');

            $posts = Page::orderBy('created_at', 'desc')->get();
            foreach ($posts as $post) {
                $sitemap->add($this->URL . '/page/' . $post->slug, $post->updated_at);
            }

            $news = News::orderBy('created_at', 'desc')->get();
            foreach ($news as $new) {
                $sitemap->add($this->URL . '/page/' . $new->slug, $new->updated_at);
            }

        }

        return $sitemap->render('xml');

    }


}
