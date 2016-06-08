<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Work;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     *                  $goodsList получает список товаров по текущей локале и отдаёт представлению
     */
    public function index()
    {
        $goodsList = Goods::where('lang', App::getLocale())->orderBy('id', 'asc')->limit(4)->get();
        $goods = [];
        $category = Category::get();
        foreach ($category as  $value) {
            $good = $value->goods()->where('lang', App::getLocale())->first();
            $goods[$value->id] = $good;
            $attributes =[];
            $attribute = unserialize($good->attribute);
                foreach($attribute as $key => $attr)
                {
                    if($key % 2 ==0){
                        $attributes[$attribute[$key]] = $attribute[$key+1];
                    }
                }
            $goods[$value->id . '-attr'] = $attributes;
        }

        return view('site.catalog', [
            'goodsList' => $goodsList,
            'goods' => $goods
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

        $prev = Goods::select('slug')->whereRaw('lang = ? and id != ? and id > ?',
            [App::getLocale(), $goods->id, $good->id])->orderBy('id', 'ASC')->first();

        if (is_null($prev)) {
            $prev = Goods::select('slug')->whereRaw('lang = ? and id != ? and id < ?',
                [App::getLocale(), $goods->id, $good->id])->orderBy('id', 'ASC')->limit(1)->first();
        }

        $next = Goods::select('slug')->whereRaw('lang = ? and id != ? and id < ?',
            [App::getLocale(), $goods->id, $good->id])->orderBy('id', 'Desc')->first();
        if (is_null($next)) {
            $next = Goods::select('slug')->whereRaw('lang = ? and id != ? and id > ?',
                [App::getLocale(), $goods->id, $good->id])->orderBy('id', 'Desc')->limit(1)->first();
        }


        $Work = Work::select('id')
            ->where('category_id', $good->category_id)
            ->where('lang', App::getLocale())
            ->first();

        return view('site.catalogElement', [
            'Goods' => $good,
            'next' => $next,
            'prev' => $prev,
            'Work' => $Work,
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
     * @param int $id
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
