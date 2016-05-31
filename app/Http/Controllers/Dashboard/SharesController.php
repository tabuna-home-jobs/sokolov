<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SharesRequest;
use App\Models\Shares;
use Image;
use Session;

class SharesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $SharesList = Shares::orderBy('id', 'desc')->paginate(15);

        return view('dashboard/shares/shares', ['SharesList' => $SharesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard/shares/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SharesRequest $request)
    {
        $shares = new Shares(
            $request->all()
        );

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $shares->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }
        $shares->save();

        //Флеш сообщение
        Session::flash('good', 'Вы успешно добавили значения');

        return redirect()->route('dashboard.shares.index');
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
    public function edit(Shares $shares)
    {
        return view('dashboard/shares/edit', ['Shares' => $shares]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Shares $shares, SharesRequest $request)
    {
        $shares->fill(
            $request->all()
        );

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $shares->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }

        $shares->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('{local}.dashboard.shares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(Shares $shares)
    {
        $shares->delete();
        return response(200);
        //Session::flash('good', 'Вы успешно удалили значения');
        //return redirect()->route('dashboard.shares.index');
    }
}
