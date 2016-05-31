<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Blog;
use Image;
use Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Blog = Blog::orderBy('id', 'desc')->paginate(15);

        return view('dashboard/blog/blog', ['blog' => $Blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard/blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(NewsRequest $request)
    {
        $blog = new Blog(
            $request->all()
        );

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $blog->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }
        $blog->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.blog.index');
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
    public function edit(Blog $blog)
    {
        return view('dashboard/blog/edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Blog $blog, NewsRequest $request)
    {
        $blog->fill(
            $request->all()
        );

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension());
            $blog->avatar = '/upload/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
        }

        $blog->save();

        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->route('dashboard.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response(200);
        //Session::flash('good', 'Вы успешно удалили значения');
        //return redirect()->route('dashboard.blog.index');
    }
}
