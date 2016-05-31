<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamplesRequest;
use App\Models\Block;
use App\Models\Goods;
use App\Models\Examples;
use Image;
use Request;
use Session;

class ExamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Examples = Examples::orderBy('id', 'desc')->paginate(15);

        return view('dashboard/examples/examples', ['Examples' => $Examples]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $Blocks = Block::all();
        $Category = Goods::all();

        return view('dashboard/examples/create', [
            'Category' => $Category,
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
    public function store(ExamplesRequest $request)
    {
        $Examples = new Examples($request->all());
        $Examples->category_id = $request->category;
        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))/*->resize(300, 200)*/
            ->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $Examples->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }

        if ($request->hasFile('icon')) {
            Image::make($request->file('icon'))/*->resize(300, 200)*/
            ->save('upload/'.time().'.'.$request->file('icon')->getClientOriginalExtension());
            $Examples->icon = '/upload/'.time().'.'.$request->file('icon')->getClientOriginalExtension();
        }

        if (!is_null($request->fieldsAttr)) {
            $Examples->attribute = serialize(array_filter($request->fieldsAttr));
        }

        $Examples->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.examples.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
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
     * @return Response
     */
    public function edit($Examples)
    {
        $Examples = Examples::where('slug', $Examples)->firstOrFail();

        $Blocks = Block::all();
        $Category = Goods::all();

        return view('dashboard/examples/edit', [
            'Examples' => $Examples,
            'Category' => $Category,
            'Blocks' => $Blocks,
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
    public function update(ExamplesRequest $request, $Examples)
    {
        $Examples = Examples::where('slug', $Examples)->firstOrFail();

        $Examples->fill($request->all());
        $Examples->category_id = $request->category;
        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))/*->resize(300, 200)*/
            ->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $Examples->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }

        if ($request->hasFile('icon')) {
            Image::make($request->file('icon'))/*->resize(300, 200)*/
            ->save('upload/'.time().'.'.$request->file('icon')->getClientOriginalExtension());
            $Examples->icon = '/upload/'.time().'.'.$request->file('icon')->getClientOriginalExtension();
        }

        if (!is_null($request->fieldsAttr)) {
            $Examples->attribute = serialize(array_filter($request->fieldsAttr));
        }

        $Examples->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.examples.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($Examples)
    {
        $Examples = Examples::where('slug',  $Examples)->firstOrFail();
        $Examples->delete('cascade');
        return response(200);
        //Session::flash('good', 'Вы успешно удалили значения');
        //return redirect()->route('dashboard.examples.index');
    }
}
