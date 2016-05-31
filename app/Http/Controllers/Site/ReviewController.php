<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Image;
use Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ReviewList = Review::where('lang', App::getLocale())
            ->where('publish', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('site.reviews', [
            'ReviewList' => $ReviewList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        $Review = new Review(
            $request->all()
        );
        $Review->publish = 0;

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $Review->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }
        $Review->save();

        Session::flash('good', trans('alert.You have successfully left a review'));

        return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
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
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
