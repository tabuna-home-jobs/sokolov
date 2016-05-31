<?php

namespace App\Http\Widgets;

use App\Services\Widget\Widget;

class ModalWidget extends Widget
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

     /**
      * @return mixed
      */
     public function run()
     {
         return view('', [
         ]);
     }
}
