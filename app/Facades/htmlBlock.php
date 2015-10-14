<?php namespace App\Facades;

use App;
use App\Models\Block;
use Illuminate\Support\Facades\Facade;

class htmlBlock extends Facade
{

    static function getGoodSlider($BlockId)
    {
        $Block = Block::find($BlockId);

        if (is_null($Block))
            return null;

        $Elements = $Block->getElements()->where('lang', App::getLocale())->get();

        if($Elements->count() == 0)
            return null;

        return view('htmlBlock.GoodsSlider', [
            'Elements' => $Elements
        ]);
    }


    static function getMainSlider($BlockId = 4)
    {
        $Block = Block::find($BlockId);
        $Elements = $Block->getElements()->where('lang', App::getLocale())->get();

        if($Elements->count() == 0)
            return null;

        return view('htmlBlock.MainSlider', [
            'Elements' => $Elements
        ]);
    }



}
