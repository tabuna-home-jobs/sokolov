<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;
use Image;
use Redirect;
use Request;
use Session;
use Validator;
use App\Http\Requests\NewsRequest;





class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $NewsList = News::orderBy('id', 'desc')->paginate(15);
        return view("dashboard/news/news", ['NewsList' => $NewsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("dashboard/news/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($local ,NewsRequest $request)
    {

        $news = new News(
            $request->all()
        );

        if($request->hasFile('avatar'))
        {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension());
            $news->avatar = '/upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }
        $news->save();

        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('{local}.dashboard.news.index', $local);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($local, News $news)
    {
        return view("dashboard/news/edit", ['news' => $news ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($local, News $news, NewsRequest $request)
    {
        $news->fill(
            $request->all()
        );

        if($request->hasFile('avatar'))
        {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension());
            $news->avatar = '/upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }

        $news->save();

        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('{local}.dashboard.news.index',$local);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($local, News $news)
    {
        $news->delete();
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('{local}.dashboard.news.index', $local);
    }
}
