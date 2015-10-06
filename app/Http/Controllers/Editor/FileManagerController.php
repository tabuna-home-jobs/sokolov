<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Files;
use App\Models\FilesMeta;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        foreach ($request->file('files') as $file) {

            $task = Auth::user()->getTask()->findOrFail($request->beglouto);

            if (!Storage::exists('/app/order/' . date("Y-m-d"))) {
                Storage::makeDirectory('/app/order/' . date("Y-m-d"));
            }

            $file->move(storage_path() . '/app/order/' . date("Y-m-d"), Str::ascii(time() . '-' . $file->getClientOriginalName()));
            $DBfile = new Files([
                'user_id' => Auth::user()->id,
                'original' => $file->getClientOriginalName(),
                'name' => date("Y-m-d") . '/' . Str::ascii(time() . '-' . $file->getClientOriginalName()),
                'type' => 'task',
                'beglouto' => $task->id,
                'finish' => true,
            ]);
            $DBfile->save();

            $DBMeta = new FilesMeta([
                'files_id' => $DBfile->id,
                'user_id' => Auth::user()->id,
                'task_id' => $task->id,
            ]);
            $DBMeta->save();

        }

        Session::flash('good', trans('trans.You have successfully added a comment'));
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
