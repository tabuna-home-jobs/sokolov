<?php

namespace App\Services\Widget;

interface WidgetContractInterface
{
    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key);

    public function run();
}
