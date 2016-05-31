<?php

namespace App\Http\Controllers\Dashboard;

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
        $Review = Review::orderBy('id', 'desc')->paginate(15);

        return view('dashboard/reviews/reviews', ['ReviewsList' => $Review]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard/reviews/create');
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

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $Review->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }
        $Review->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.review.index');
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
        $Reviews = Review::findOrFail($id);

        return view('dashboard/reviews/edit', ['Reviews' => $Reviews]);
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
        $Review = Review::findOrFail($id);

        $Review->fill(
            $request->all()
        );

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $Review->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }
        $Review->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.review.index');
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
        $Feedback = Review::find($id);
        $Feedback->delete();
        return response(200);
        //      Session::flash('good', 'Вы успешно удалили значения');
//        return redirect()->route('dashboard.review.index');
    }
}
