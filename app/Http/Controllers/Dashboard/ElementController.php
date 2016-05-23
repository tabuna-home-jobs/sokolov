<?php

namespace app\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Element;
use Illuminate\Http\Request;
use Image;
use Session;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $Blocks = Block::all();

        return view('dashboard.element.create', [
            'Blocks' => $Blocks,
        ]);
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
        $element = new Element($request->all());

        if ($request->hasFile('img')) {
            Image::make($request->file('img'))->save(public_path().'/block/'.time().'.'.$request->file('img')->getClientOriginalExtension());
            $element->img = '/block/'.time().'.'.$request->file('img')->getClientOriginalExtension();
        }

        $element->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.element.show', $request->block_id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($block)
    {
        $block = Block::find($block);
        $elements = $block->getElements()->paginate(10);

        return view('dashboard.element.show', [
            'elements' => $elements,
            'block' => $block,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($element)
    {
        $Element = Element::findOrFail($element);
        $Blocks = Block::all();

        return view('dashboard.element.edit', [
            'Blocks' => $Blocks,
            'Element' => $Element,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $element)
    {
        $element = Element::findOrFail($element);
        $element->fill($request->all());

        if ($request->hasFile('img')) {
            Image::make($request->file('img'))->save(public_path().'/block/'.time().'.'.$request->file('img')->getClientOriginalExtension());
            $element->img = '/block/'.time().'.'.$request->file('img')->getClientOriginalExtension();
        }

        $element->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.element.show', $element->block_id);
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
        $Element = Element::findOrFail($id);
        $Element->delete();
        Session::flash('good', 'Вы успешно удалили значение');

        return redirect()->back();
    }
}
