<?php

namespace App\Observer;

use CurrencyRate;


class ConvertValueObserver
{

    public function saving($model)
    {
        $model->price_rub = CurrencyRate::getOneRecord() * $model->price;
    }


}


?>