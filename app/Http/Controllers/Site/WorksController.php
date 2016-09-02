<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App;
use App\Models\Goods;
use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Category;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goodsList = Goods::where('lang', App::getLocale())->orderBy('id', 'asc')->limit(4)->get();

        return view('site.work', [
            'goodsList' => $goodsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $prev = Category::select('id')->whereRaw('id != ? and id > ?',
            [$id, $id])->orderBy('id', 'ASC')->first();

        if (is_null($prev)) {
            $prev = Category::select('id')->whereRaw('id != ? and id < ?',
                [$id, $id])->orderBy('id', 'ASC')->limit(1)->first();
        }

        $next = Category::select('id')->whereRaw('id != ? and id < ?',
            [$id, $id])->orderBy('id', 'Desc')->first();
        if (is_null($next)) {
            $next = Category::select('id')->whereRaw('id != ? and id > ?',
                [$id, $id])->orderBy('id', 'Desc')->limit(1)->first();
        }




        $Works = Work::where('category_id', $id)
            ->where('lang', App::getLocale())
            ->paginate(8);

        return view('site.works', [
            'Works' => $Works,
            'category_id' => $id,
            'next' => $next,
            'prev' => $prev,
        ]);
    }

    public function getExampleone($id)
    {
        return Work::find($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
