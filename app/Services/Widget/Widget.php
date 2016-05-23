<?php

namespace app\Services\Widget;

use Cache;
use Config;

class Widget implements WidgetContractInterface
{
    public $cache = 0;

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        $class = config('app.widgets.'.$key);
        $widget = new $class();

        if ($widget->cache) {
            return Cache::remember('widgets-'.$key, $widget->cache, function (Widget $widget) {
                return $widget->run();
            });
        } else {
            return $widget->run();
        }
    }

    public function run()
    {
    }
}
