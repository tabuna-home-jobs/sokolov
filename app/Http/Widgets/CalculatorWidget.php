<?php namespace App\Http\Widgets;

use App\Services\Widget\Widget;
use App\Models\Goods;
use App;

class CalculatorWidget extends Widget {


    public $lang;

    /**
     * Class constructor.
     */
    public function __construct(){
        $this->lang = App::getLocale();
    }

    /**
     * @return mixed
     */
     public function run(){

         $services = Goods::select('id','name')
                    ->where('calculator',true)
                    ->where('lang',$this->lang)
                    ->get();

         return view('htmlBlock.calculator',[
             'services' => $services
         ]);
     }

}