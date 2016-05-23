<?php

namespace app\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $PageList = Page::orderBy('id', 'desc')->paginate(15);

        return view('dashboard/page/pages', ['PageList' => $PageList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard/page/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page(
            $request->all()
        );
        $page->save();

        Session::flash('good', 'Вы успешно добавили значения');

        return redirect()->route('dashboard.page.index');
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Page $page)
    {
        return view('dashboard/page/edit', ['Page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Page $page, PageRequest $request)
    {
        $page->fill(
            $request->all()
        )->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        Session::flash('good', 'Вы успешно удалили значения');

        return redirect()->route('dashboard.page.index');
    }
}
