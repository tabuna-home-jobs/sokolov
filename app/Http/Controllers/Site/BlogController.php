<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Blog;
use App\Models\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blog = Blog::all();
        foreach($blog as $value)
        {
            $value->save();
        }



        return view('site.blogList', [
            'BlogList' => Blog::where('lang', App::getLocale())->orderBy('id', 'desc')->simplePaginate(5),
            'NewsList' => News::whereRaw('lang = ?', [App::getLocale()])->orderBy('id', 'desc')->limit(3)->get()
        ]);
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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Blog $blog)
    {
        return view('site.blog', [
            'Blog' => $blog,
            'NewsList' => News::whereRaw('lang = ?', [App::getLocale()])->orderBy('id', 'desc')->limit(5)->get()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
