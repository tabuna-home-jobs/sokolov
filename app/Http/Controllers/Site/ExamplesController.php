<?php

namespace app\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\Examples;
use App\Models\Goods;
use Illuminate\Http\Request;

class ExamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     *                  $goodsList получает список товаров по текущей локале и отдаёт представлению
     */
    public function index()
    {
        //$goodslist = Goods::where('lang', App::getLocale())->orderBy('id', 'asc')->limit(4)->get();
        $goodslist = Goods::where('lang', App::getLocale())

                    //Берём такуеже статью на др языке, связь у нас по категории
                    ->with(['lang' => function ($query) {
                        $query->where('lang', '<>', App::getLocale());
                    }])
                    ->orderBy('id', 'asc')->limit(4)->get();

        //$examplesList = Examples::where('lang', App::getLocale())->orderBy('id', 'asc')->limit(4)->get();

        return view('site.examples', [
            'goodslist' => $goodslist,
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
    public function show(Goods $goods)
    {
        $good = Goods::whereRaw('lang = ? and id = ?', [App::getLocale(), $goods->id])->firstOrFail();
        $exampleslist = Examples::whereRaw('lang = ? and category_id = ?', [App::getLocale(), $goods->id])->orderBy('id', 'asc')->limit(8)->get();

        return view('site.catalogElement', [
            'Good' => $good,
            'exampleslist' => $exampleslist,
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
    }

    public function getExampleone($id)
    {
        return Goods::where(['id' => $id])->with(['lang' => function ($query) {
                        $query->where('lang', '<>', App::getLocale());
                    }])->first()->toJson();
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
