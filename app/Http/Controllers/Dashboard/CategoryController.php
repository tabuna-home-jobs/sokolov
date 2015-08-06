<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Image;
use Request;
use Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Category = Category::orderBy('id', 'desc')->paginate(15);
        return view("dashboard/category/category",['Category' => $Category ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("dashboard/category/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($local, CategoryRequest $request)
    {

        $Category = new Category($request->all());

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension());
            $Category->avatar = '/upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }

        $Category->save();

        //Флеш сообщение
        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('{local}.dashboard.category.index', $local);
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
    public function edit($local, Category $category)
    {
        return view("dashboard/category/edit",[
                'Category' => $category
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($local, Category $Category,  CategoryRequest $request)
    {

        $Category->fill($request->all());

        if ($request->hasFile('avatar')) {
            Image::make($request->file('avatar'))->resize(300, 200)->save('upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension());
            $Category->avatar = '/upload/' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }

        $Category->save();

        //Флеш сообщение
        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('{local}.dashboard.category.index', $local);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($local, Category $category)
    {
        $category->delete('cascade');
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('{local}.dashboard.category.index',$local);
    }
}
