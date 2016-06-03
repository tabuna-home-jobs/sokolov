<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Excel;

class SuscribleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.subscribe.index',[
            'subscribes' => Subscribe::paginate()
        ]);
    }


    /**
     *
     */
    public function store(){
        Excel::create('email', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $sheet->fromArray(Subscribe::select('email')->get());
            });
        })->export('xls');
    }


    /**
     * @param $id
     */
    public function destroy($id){
        Subscribe::findOrFail($id)->delete();
        return response(200);
    }

}
