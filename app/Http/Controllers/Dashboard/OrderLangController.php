<?php

namespace app\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LangOrder;
use Illuminate\Http\Request;
use Session;

class OrderLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LangOrder = LangOrder::paginate(15);

        return view('dashboard.order.LangOrder', [
            'LangOrder' => $LangOrder,
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
        LangOrder::create($request->all());
        Session::flash('good', 'Вы успешно добавили значения');

        return redirect()->back();
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
        //
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
        $OrderLang = LangOrder::findOrFail($id);

        return view('dashboard.order.LandOrderEdit', [
            'OrderLang' => $OrderLang,
        ]);
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
        $OrderLang = LangOrder::findOrFail($id);
        $OrderLang->fill($request->all());
        $OrderLang->save();
        Session::flash('good', 'Вы успешно изменили значение');

        return redirect()->route('dashboard.langorder.index');
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
        $OrderLang = LangOrder::findOrFail($id);
        $OrderLang->delete('cascade');
        Session::flash('good', 'Вы успешно удалили значение и связанные с ним данные');

        return redirect()->back();
    }
}
