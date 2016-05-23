<?php

namespace app\Facades;

use App\Services\IntisSMS;
use Illuminate\Support\Facades\Facade;

class IntisSMSFacades extends Facade
{
    /**
     * Получить зарегистрированное имя компонента.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return  IntisSMS::class;
    }
}
