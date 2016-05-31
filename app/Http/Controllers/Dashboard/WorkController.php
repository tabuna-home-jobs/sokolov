<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Category;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Works = Work::orderBy('id', 'desc')->paginate(15);

        return view('dashboard/work/work', ['Works' => $Works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('dashboard/work/create', [
            'category' => $category,
        ]);
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
        $blog = new Work($request->all());
        $blog->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.work.index');
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
    public function edit(Work $work)
    {
        $category = Category::all();

        return view('dashboard/work/edit', [
            'work' => $work,
            'category' => $category,
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
    public function update(Request $request, Work $work)
    {
        $work->fill(
            $request->all()
        );
        $work->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.work.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return response(200);
        //Session::flash('good', 'Вы успешно удалили значения');

        //return redirect()->route('dashboard.work.index');
    }
}
