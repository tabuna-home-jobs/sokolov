<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Goods;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * $goodsList получает список товаров по текущей локале и отдаёт представлению
     *
     */
    public function index()
    {

        $goodsList = Goods::where('lang', App::getLocale())->orderBy('id', 'asc')->limit(4)->get();

        return view('site.catalog',[
            'goodsList' => $goodsList
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
    public function show(Goods $goods)
    {
        $good = Goods::whereRaw('lang = ? and id = ?',[App::getLocale(), $goods->id])->firstOrFail();


        return view('site.catalogElement',[
            'Goods' => $good
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
