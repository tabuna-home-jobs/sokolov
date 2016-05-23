<?php

namespace app\Services\orchid\seo\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\orchid\seo\Models\SEO;

class SEOFacades extends Facade
{
    /**
     * Получить зарегистрированное имя компонента.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SEO::class;
    }
}
