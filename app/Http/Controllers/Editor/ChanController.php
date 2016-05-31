<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Editor\ChanRequest;
use App\Models\Task;
use Auth;
use Illuminate\Http\Request;
use Session;

class ChanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $freeTask = Task::where('user_id', 0)->with('getGoods')->paginate(15);

        return view('editor.chan', [
            'Tasks' => $freeTask,
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
    public function store(ChanRequest $request)
    {
        $task = Task::where('user_id', 0)->findOrFail($request->task_id);
        $task->user_id = Auth::user()->id;
        $task->status = 'В работе';
        $task->save();

        //event(new Notification($task->id));

        Session::flash('good', trans('alert.You have successfully taken the task'));

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
