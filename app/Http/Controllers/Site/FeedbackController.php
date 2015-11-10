<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Site\FeedbackRequest;
use Config;
use Mail;
use Session;

class FeedbackController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('site.feedback');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FeedbackRequest $request)
    {

        /*
        Mail::raw('Сообщение от ' . $request->fio . '<br>' . $request->message . '<br>' . 'Контактные данные:' . $request->email . '<br>' . $request->phone, function ($message) {
            $message->from(Config::get('link.email'))
                    ->to(Config::get('link.email'))
                    ->subject('Сообщение с Falcon Editing');
        });
        */


        Mail::send('emails.feedback', ['request' => $request->all()], function ($message) {
            $message->from(Config::get('link.email'))
                ->to(Config::get('link.email'))
                ->subject('Сообщение с Falcon Editing');
        });


        Session::flash('good', trans('alert.Thank you for writing, we will respond to you.'));
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
     * @param  int $id
     * @return Response
     */
    public function update($id)
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