<?php

namespace App\Observer;

use App\Models\Order;
use CurrencyRate;

class ConvertValueObserver
{

    public function saving($model)
    {
        $order = Order::find($model->id);

        if (is_null($model) || $model->price != $order->price) {
            $model->price_rub = CurrencyRate::getOneRecord() * $model->price;
        }


    }


}


?>