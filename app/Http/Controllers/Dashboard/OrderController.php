<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Site\OrderElementRequest;
use App\Models\Comments;
use App\Models\Files;
use App\Models\Order;
use App\Models\User;
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

        $SelectGoodFile = Files::select('id','original','created_at')
            ->whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, true])->get();

        $SelectRequestFile = Files::select('id','original','created_at')
            ->whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, false])->get();

        $AllUser = User::select('id','first_name','last_name')->where('role', 'NOT LIKE', '%user%')->get();


        $TaskOrder = $SelectOrder->getTask()->get();

        return view("dashboard/order/orderElement", [
            'Orders' => $Orders,
            'SelectOrder' => $SelectOrder,
            'SelectUser' => $SelectUser,
            'SelectComments' => $SelectComments,
            'SelectGoods' => $SelectGoods,
            'SelectGoodFile' => $SelectGoodFile,
            'SelectRequestFile' => $SelectRequestFile,
            'AllUser' => $AllUser,
            'TaskOrder' => $TaskOrder,
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
    public function update(OrderElementRequest $request, $id)
    {
        $order = Order::findorFail($id);
        $order->fill($request->all());
        $order->save();
        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->back();
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
