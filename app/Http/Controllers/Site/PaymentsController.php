<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use CurrencyRate;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return abort(404);
        $payments = Auth::user()->getPayments()->with('getOrder')->paginate(10);
        return view('site.listPayments', [
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $order = Auth::user()
            ->getOrders()
            ->Select('id', 'price', 'name', 'price_rub')
            ->whereRaw('price > ? and sold = ?', ['0.01', 'false'])
            ->get();

        return view('site.paymentsCreate', [
            'order' => $order
        ]);
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
    public function show($id)
    {
        $order = Auth::user()
            ->getOrders()
            ->Select('id', 'price', 'name', 'price_rub')
            ->whereRaw('price > ? and sold = ?', ['0.01', 'false'])
            ->findOrFail($id);

        $order->price_rub = CurrencyRate::getOneRecord() * $order->price;
        $order->save();


        return view('site.paymentsCreate', [
            'order' => $order
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
