<?php

namespace App\Facades;

use App\Services\CurrencyRate;
use Illuminate\Support\Facades\Facade;

class CurrencyRateFacades extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return CurrencyRate::class;
    }
}
