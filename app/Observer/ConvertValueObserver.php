<?php

namespace App\Observer;

use App\Models\Order;
use CurrencyRate;
use App;
use Session;
class ConvertValueObserver
{

    public function saving($model)
    {
        $order = Order::find($model->id);

        if (is_null($model)) {
            $model->price_rub = CurrencyRate::getOneRecord() * $model->price;
        } elseif (!is_null($model->price) && !is_null($order->price)) {
            if ($model->price != $order->price) {
                $model->price_rub = CurrencyRate::getOneRecord() * $model->price;
            }
        }

        App::setLocale(Session::get('lang', 'en'));

    }


}


?>