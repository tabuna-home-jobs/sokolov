<?php

namespace App\Http\Widgets;

use App\Services\Widget\Widget;
use App\Models\Modal;
use App;
use Session;

class ModalWidget extends Widget
{
    /**
     * @var
     */
    public $lang;

    /**
     *
     */
    public $modal;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->lang = App::getLocale();
    }

     /**
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
     public function run($data = null)
     {
         if (Session::get('modals', 'show') == 'show') {
             $this->modal = Modal::where('lang', $this->lang)->first();
             Session::put('modals', 'hidden');

             if (!is_null($this->modal)) {
                 return view('htmlBlock.modals', [
                     'modal' => $this->modal,
                 ]);
             }
         }
     }
}
