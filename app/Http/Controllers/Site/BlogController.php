<?php

namespace app\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\News;
use Illuminate\Http\Request;
use Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (!empty($request->input('tags'))) {
            $blogList = Blog::where('lang', App::getLocale())
               ->where('tag', 'LIKE', '%'.$request->input('tags').'%')
               ->orderBy('id', 'desc')
               ->simplePaginate(5);
        } else {
            $blogList = Blog::where('lang', App::getLocale())->orderBy('id', 'desc')->simplePaginate(5);
        }

        return view('site.blogList', [
            'BlogList' => $blogList,
            'NewsList' => News::whereRaw('lang = ?', [App::getLocale()])->orderBy('id', 'desc')->limit(3)->get(),
            'TagList' => $this->blogTags(),
        ]);
    }

    /**
     * @return mixed
     */
    public function blogTags()
    {
        return $TagList = Cache::remember('blog-tags-'.App::getLocale(), 10, function () {
            $Tags = Blog::select('tag')
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
    public function show(Blog $blog)
    {
        return view('site.blog', [
            'Blog' => $blog,
            'NewsList' => News::whereRaw('lang = ?', [App::getLocale()])->orderBy('id', 'desc')->limit(3)->get(),
            'TagList' => $this->blogTags(),
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
