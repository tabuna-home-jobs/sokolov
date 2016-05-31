<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Cache;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (!empty($request->input('tags'))) {
            $NewsList = News::where('lang', App::getLocale())
                ->where('tag', 'LIKE', '%'.$request->input('tags').'%')
                ->orderBy('id', 'desc')
                ->paginate(12);
        } else {
            $NewsList = News::where('lang', App::getLocale())->orderBy('id', 'desc')->paginate(12);
        }

        return view('site.newsList', [
            'NewsList' => $NewsList,
            'NewsTags' => $this->newsTags(),
        ]);
    }

    /**
     * @return mixed
     */
    public function newsTags()
    {
        return $TagList = Cache::remember('news-tags-'.App::getLocale(), 10, function () {
            $Tags = News::select('tag')
                ->where('lang', App::getLocale())
                ->get();

            $TagList = '';
            foreach ($Tags as $tag) {
                $TagList .= $tag->tag.',';
            }

            return $TagList = array_unique(array_filter(
                (explode(',', $TagList)),
                function ($el) { return !empty($el);}
            ));
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(News $news)
    {
        return view('site.news', [
            'News' => $news,
            'NewsList' => News::whereRaw('lang = ? and id != ?', [App::getLocale(), $news->id])->orderBy('id', 'desc')->limit(3)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
