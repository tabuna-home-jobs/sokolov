<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Comments;
use App\Models\Files;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Orders = Order::select('id','name','created_at')->orderBy('id', 'desc')->simplePaginate(15);
        return view("dashboard/order/order", ['Orders' => $Orders]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $Orders = Order::select('id','name','created_at')->orderBy('id', 'desc')->simplePaginate(15);

        $SelectOrder = Order::findorfail($id);
        $SelectUser = $SelectOrder->getUser()->get()->first();
        $SelectComments = Comments::whereRaw('type = ? and beglouto = ?', ['order', $id])->get();
        $SelectGoods = $SelectOrder->getGoods()->get();
        $SelectGoodFile = Files::whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, true])->get();
        $SelectRequestFile = Files::whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, false])->get();

        return view("dashboard/order/orderElement", [
            'Orders' => $Orders,
            'SelectOrder' => $SelectOrder,
            'SelectUser' => $SelectUser,
            'SelectComments' => $SelectComments,
            'SelectGoods' => $SelectGoods,
            'SelectGoodFile' => $SelectGoodFile,
            'SelectRequestFile' => $SelectRequestFile
        ]);
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
