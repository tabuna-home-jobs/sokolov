<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App;
use App\Models\Goods;
use App\Http\Controllers\Controller;
use App\Models\Work;

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
        $Works = Work::where('category_id', $id)
            ->where('lang', App::getLocale())
            ->simplePaginate(8);

        return view('site.works', [
            'Works' => $Works,
        ]);
    }

    public function getExampleone($id)
    {

        //return Work::where(['id' => $id])->first()->toJson();

        return '
{"id":"6","category_id":"5","name":"Chemistry","before":"<img src=\"..\/..\/..\/dash\/source\/Blog%20Pictures\/Translation%20Samples\/Chemistry%20-%20English.PNG\" border=\"0\" alt=\"Chemistry - English\" width=\"622\" height=\"806\" \/>","after":"<img src=\"..\/..\/..\/dash\/source\/Blog%20Pictures\/Translation%20Samples\/Chemistry%20-%20Russian.PNG\" border=\"0\" alt=\"Chemistry - Russian\" width=\"621\" height=\"805\" \/>","created_at":"2016-03-10 11:48:20","updated_at":"2016-04-21 08:56:26","lang":"en","author":"Falcon Scientific Editing"}
';
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
