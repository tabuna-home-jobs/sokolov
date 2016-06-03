<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Category;
use Image;
use Validator;
use Storage;

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
        $work = new Work($request->all());


        foreach($request->files as $key => $files) {
            $time = time();

            $v = Validator::make([$key=> $files], [
                $key => 'mimes:jpeg,bmp,png',
            ]);

            if(!$v->fails()){
                Image::make($request->file($key))->save('upload/work/'.$key .'/'.$time.'.'.$request->file($key)->getClientOriginalExtension());
                $work->$key = '/upload/work/'.$key .'/'.$time.'.'.$request->file($key)->getClientOriginalExtension();
            }
            else{
                $work->$key->move( 'upload/work/'.$key .'/',
                    $time.'.'.$request->file($key)->getClientOriginalExtension()
                );
                $work->$key = '/upload/work/'.$key .'/'.$time.'.'.$request->file($key)->getClientOriginalExtension();
            }

        }


        $work->save();
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

        foreach($request->files as $key => $files) {
            $time = time();

            $v = Validator::make([$key=> $files], [
                $key => 'mimes:jpeg,bmp,png',
            ]);

            if(!$v->fails()){
                Image::make($request->file($key))->save('upload/work/'.$key .'/'.$time.'.'.$request->file($key)->getClientOriginalExtension());
                $work->$key = '/upload/work/'.$key .'/'.$time.'.'.$request->file($key)->getClientOriginalExtension();
            }
            else{
                $work->$key->move( 'upload/work/'.$key .'/',
                    $time.'.'.$request->file($key)->getClientOriginalExtension()
                );
                $work->$key = '/upload/work/'.$key .'/'.$time.'.'.$request->file($key)->getClientOriginalExtension();
            }

        }




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
