<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use CurrencyRate;
use Cache;
use App;

class CalculatorController extends Controller
{
    public $local;

    /**
     * CalculatorController constructor.
     */
    public function __construct()
    {
        $this->local = App::getLocale();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getService($id)
    {
        $value = Cache::remember('calculator-'.$id.'-'.$this->local, 1, function () use ($id) {
            $service = Goods::findORFail($id);
            $attr = unserialize($service->attribute);

            foreach ($attr as $key => $value) {
                if ((is_float($value) || is_int($value)) && $this->local == 'ru') {
                    $attr[$key] = round($value * CurrencyRate::getOneRecord(), 2);
                } elseif (is_float($value)) {
                    $attr[$key] = round($value, 2);
                }
            }

            return $attr;
        });

        return response()->json($value);
    }
}
