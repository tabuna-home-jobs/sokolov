<?php

namespace App\Services\Widget;

interface WidgetContractInterface
{
    /**
     * @param $key
     * @param $data
     * @return mixed
     */
    public function get($key,$data = null);

    /**
     * @param $data
     * @return mixed
     */
    public function run($data);
}
