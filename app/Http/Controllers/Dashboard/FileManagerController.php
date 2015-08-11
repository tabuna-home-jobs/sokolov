<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Files;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        foreach($request->file('files') as $file)
        {
            $file->move(storage_path() . '/app/order/', Str::ascii( time() . '-' .  $file->getClientOriginalName()));
            $DBfile = new Files([
                'user_id' => Auth::user()->id,
                'original' =>  $file->getClientOriginalName(),
                'name' => Str::ascii( time() . '-' .  $file->getClientOriginalName()),
                'type' => $request->input('type'),
                'beglouto' => $request->input('beglouto'),
                'finish' => true,
            ]);
            $DBfile->save();
        }

        return abort(200);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
