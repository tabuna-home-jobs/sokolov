<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modal;
use Session;

class ModalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ModalsList = Modal::orderBy('id', 'desc')->paginate(15);

        return view('dashboard.modals.index', ['ModalList' => $ModalsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modals.create');
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
        Modal::create($request->all());
        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.modals.index');
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
        $modal = Modal::findOrFail($id);

        return view('dashboard.modals.edit', ['modal' => $modal]);
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
        $modal = Modal::findOrFail($id);
        $modal->fill($request->all());
        $modal->save();
        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.modals.index');
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
        Modal::findOrFail($id)->delete();

        return response(200);
    }
}
