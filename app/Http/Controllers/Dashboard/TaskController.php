<?php

namespace app\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\FilesMeta;
use App\Models\Task;
use Illuminate\Http\Request;
use Session;
use SMS;

class TaskController extends Controller
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
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $task = new Task($request->all());

        if ($request->user_id == 0) {
            $task->status = 'Исполнитель не определён';
        } else {
            $task->status = 'В работе';
            //Отправить СМС

            SMS::send($task->getUser()->first()->phone, 'У вас новая задача в системе');
        }

        $FilesMeta = [];
        foreach ($request->input('files') as $file) {
            $FilesMeta = array_add($FilesMeta, $file, new FilesMeta([
                'files_id' => $file,
                'user_id' => $task->user_id,
                'tastk_id' => $task->id,
            ]));
        }

        $task->save();
        $task->getFileMeta()->saveMany($FilesMeta);

        Session::flash('good', 'Вы успешно добавили значения');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($TastId)
    {
        $task = Task::with('getUser', 'getGoods', 'getOrder', 'getUser', 'getFileMeta.getFiles')->findOrFail($TastId);
        // dd($task);

        $comments = Comments::whereRaw('type = ? and beglouto = ?', ['task', $task->id])->paginate(15);

        return view('dashboard.order.task', [
            'task' => $task,
            'comments' => $comments,
        ]);
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
        $task = Task::findOrFail($id);
        $task->fill($request->all());
        $task->save();
        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->back();
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
