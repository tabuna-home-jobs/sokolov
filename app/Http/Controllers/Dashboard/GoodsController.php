<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsRequest;
use App\Models\Category;
use App\Models\Goods;
use Image;
use Request;
use Session;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Goods = Goods::orderBy('id', 'desc')->paginate(15);
        return view("dashboard/goods/goods",['Goods' => $Goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $Category = Category::all();
        return view("dashboard/goods/create",['Category' => $Category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(GoodsRequest $request)
    {
        $Goods = new Goods($request->all());
        $Goods->category_id = $request->category;
        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension());
            $Goods->avatar = '/upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }

        if(!is_null($request->fieldsAttr))
            $Goods->attribute = serialize(array_filter($request->fieldsAttr));

        $Goods->save();

        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('dashboard.goods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Goods $Goods)
    {
        $Category = Category::all();
        return view("dashboard/goods/edit",['Goods' => $Goods , 'Category' => $Category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(GoodsRequest $request, Goods $Goods)
    {
        $Goods->fill($request->all());
        $Goods->category_id = $request->category;
        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension());
            $Goods->avatar = '/upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }

        if(!is_null($request->fieldsAttr))
            $Goods->attribute = serialize(array_filter($request->fieldsAttr));

        $Goods->save();

        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('dashboard.goods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Goods $Goods)
    {
        $Goods->delete('cascade');
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('dashboard.goods.index');
    }
}
