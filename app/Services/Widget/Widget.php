<?php

namespace App\Services\Widget;

use Cache;
use Config;

class Widget implements WidgetContractInterface
{
    public $cache = 0;

    /**
     * @param $key
     * @param null $data
     *
     * @return mixed
     */
    public function get($key, $data = null)
    {
        $class = config('app.widgets.'.$key);
        $widget = new $class();

        if ($widget->cache) {
            return Cache::remember('widgets-'.$key, $widget->cache, function (Widget $widget) use ($data) {
                return $widget->run($data);
            });
        } else {
            return $widget->run($data);
        }
    }

    /**
     * @param null $data
     */
    public function run($data = null)
    {
    }
}
