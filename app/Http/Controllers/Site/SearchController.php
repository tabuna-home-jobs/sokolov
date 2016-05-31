<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\News;
use Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $search = Request::input('search');

        $searchList = News::where('content', 'LIKE', '%'.$search.'%')
            ->whereOr('title', 'LIKE', '%'.$search.'%')
            ->whereOr('descript', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        $searchGoods = Goods::
        where('text', 'LIKE', '%'.$search.'%')
            ->whereOr('title', 'LIKE', '%'.$search.'%')
            ->whereOr('descript', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return view('site.search', [
            'searchList' => $searchList,
            'searchGoods' => $searchGoods,
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
    public function show($id)
    {
        //
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
