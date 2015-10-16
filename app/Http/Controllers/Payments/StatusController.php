<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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
        $configs = Config::get('yandexMoney');

        //$hash = md5($_POST['action'] . ';' . $_POST['orderSumAmount'] . ';' . $_POST['orderSumCurrencyPaycash'] . ';' . $_POST['orderSumBankPaycash'] . ';' . $configs['shopId'] . ';' . $_POST['invoiceId'] . ';' . $_POST['customerNumber'] . ';' . $configs['ShopPassword']);

        $hash = md5(
            $request->action . ';' .
            $request->orderSumAmount . ';' .
            $request->orderSumCurrencyPaycash . ";" .
            $request->orderSumBankPaycash . ";" .
            $configs['shopId'] . ";" .
            $request->invoiceId . ";" .
            $request->customerNumber . ";" .
            $configs['ShopPassword']
        );

        if (strtolower($hash) != strtolower($_POST['md5'])) {
            $code = 1;
        } else {
            $code = 0;
        }
        print '<?xml version="1.0" encoding="UTF-8"?>';
        print '<checkOrderResponse performedDatetime="' . $_POST['requestDatetime'] . '" code="' . $code . '"' . ' invoiceId="' . $_POST['invoiceId'] . '" shopId="' . $configs['shopId'] . '"/>';

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Request $request)
    {
        dd($request->all());
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
