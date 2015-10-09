<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Block;
use Illuminate\Http\Request;
use Session;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Blocks = Block::paginate(15);

        return view('dashboard.block.index', [
            'Blocks' => $Blocks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.block.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Block::create($request->all());
        Session::flash('good', 'Вы успешно создали блок');
        return redirect()->route('dashboard.block.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $block
     * @return \Illuminate\View\View
     */
    public function edit($block)
    {
        return view("dashboard/block/edit", [
            'block' => $block
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $block)
    {
        $block->fill($request->all());
        $block->save();
        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('dashboard.block.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($block)
    {
        $block->delete('cascade');
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('dashboard.block.index');
    }
}
