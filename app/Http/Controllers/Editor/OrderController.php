<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Comments;
use Auth;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Tasks = Auth::user()->getTask()->where('status', '!=', 'Завершена')->orderBy('id', 'Desc')->paginate(15);
        return view('editor.order', [
            'Tasks' => $Tasks
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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($task)
    {
        $task = Auth::user()->getTask()->with('getGoods', 'getOrder', 'GetFileMeta.getFiles')->findOrFail($task);
        $comments = Comments::whereRaw('type = ? and beglouto = ?', ['task', $task->id])->get();
        return view('editor.task', [
            'Task' => $task,
            'Comments' => $comments
        ]);
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
        $task = Auth::user()->getTask()->findOrFail($id);
        $task->status = "На проверке";


        if ($task->spent == 0) {
            $task->spent = time() - $task->created_at->timestamp;
            $task->pause = date("Y-m-d H:i:s");
        } else {
            $task->spent = $task->spend + time() - $task->pause->timestamp;
            $task->pause = date("Y-m-d H:i:s");
        }


        $task->save();
        Session::flash('good', trans('alert.You have successfully changed the status of the task'));
        return redirect()->back();
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
