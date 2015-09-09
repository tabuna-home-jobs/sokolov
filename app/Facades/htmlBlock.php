<?php namespace App\Facades;

use App;
use App\Models\Block;
use Illuminate\Support\Facades\Facade;

class htmlBlock extends Facade
{

    static function getGoodSlider($BlockId)
    {
        $Block = Block::find($BlockId);
        $Elements = $Block->getElements()->where('lang', App::getLocale())->get();

        return view('htmlBlock.GoodsSlider', [
            'Elements' => $Elements
        ]);


    }


}
