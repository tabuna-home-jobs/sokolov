<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Payments;
use Config;
use Illuminate\Http\Request;
use Storage;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $contents = Storage::get('yandexTest.txt');
        dd(json_decode($contents));


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


        if (strtolower($hash) != strtolower($request->md5)) {
            $code = 1;
        } else {
            $code = 0;
        }


        $response = '<?xml version="1.0" encoding="UTF-8"?>';
        $response .= '<checkOrderResponse performedDatetime="' . $request->requestDatetime . '" code="' . $code . '"' . ' invoiceId="' . $request->invoiceId . '" shopId="' . $configs['shopId'] . '"/>';
        return response($response)->header('Content-Type', 'application/xml');
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

        $hash = md5(
            $request->action . ';' .
            $request->orderSumAmount . ';' .
            $request->orderSumCurrencyPaycash . ";" .
            $request->orderSumBankPaycash . ";" .
            $request->shopId . ";" .
            $request->invoiceId . ";" .
            $request->customerNumber . ";" .
            $configs['ShopPassword'] . ";"
        );


        if ($request->action == 'checkOrder') {

            Storage::put('yandexTest.txt', json_encode([strtolower($hash), strtolower($request->md5)]));

            if (strtolower($hash) != strtolower($request->md5)) {
                $code = 1;
            } else {
                $code = 0;
            }

            $response = '<?xml version="1.0" encoding="UTF-8"?>';
            $response .= '<checkOrderResponse performedDatetime="' . $request->requestDatetime . '" code="' . $code . '"' . ' invoiceId="' . $request->invoiceId . '" shopId="' . $configs['shopId'] . '"/>';
            return response($response)->header('Content-Type', 'application/xml');
        } elseif ($request->action == 'paymentAviso') {

            //Storage::put('yandexTest.txt', json_encode($request->all()));


            if (strtolower($hash) != strtolower($request->md5)) {
                $code = 1; //vse plosho kak ya poonayl
            } else {
                $code = 0; // vse ok

                $order = Order::find($request->customerNumber);
                $order->sold = true;
                $order->save;

                Payments::create([
                    'sum' => $request->orderSumAmount,
                    'users_id' => $order->user_id,
                    'status' => true,
                    'order_id' => $order->id
                ]);

            }

            $response = '<?xml version="1.0" encoding="UTF-8"?>';
            $response .= '<paymentAvisoResponse performedDatetime="' . $request->requestDatetime . '" code="' . $code . '" invoiceId="' . $request->invoiceId . '" shopId="' . $configs['shopId'] . '"/>';
            return response($response)->header('Content-Type', 'application/xml');


        }


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
