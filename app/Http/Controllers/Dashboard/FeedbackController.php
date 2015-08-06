<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedBackSend;
use App\Models\Feedback;
use Mail;
use Redirect;
use Request;
use Session;
use Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Request::input('noread'))
            $Feedback = Feedback::orderBy('id', 'desc')->simplePaginate(15);
        else
             $Feedback = Feedback::whereRaw('read = ?', [false])->orderBy('id', 'desc')->simplePaginate(15);

        return view("dashboard/feedback/feedback",['Feedback' => $Feedback ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($Email= null)
    {
        $Feedback = Feedback::whereRaw('id = ?', [$Email])->first();
        return view("dashboard/feedback/send", ['Feedback' => $Feedback]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($local, FeedBackSend $request)
    {

        Mail::raw($request->contentmess, function($message) use ( $request)
        {
            $message->to($request->email );
        });
        Session::flash('good', 'Вы успешно отправили письмо');
        return redirect()->route('{local}.dashboard.feedback.index',$local);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($Feedback)
    {
        $Feedback = Feedback::find($Feedback);
        $Feedback->read = true;
        $Feedback->save();
        return view("dashboard/feedback/view",['Feedback' => $Feedback ]);
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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($local,$Feedback = null)
    {
        $Feedback = Feedback::find($Feedback);
        $Feedback->delete();
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('{local}.dashboard.feedback.index',$local);
    }
}
