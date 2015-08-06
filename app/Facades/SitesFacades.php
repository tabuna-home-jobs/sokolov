<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;


class SitesFacades extends Facade {

    /**
     * Получить зарегистрированное имя компонента.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return  'App\Services\Sites';
    }
}

?>