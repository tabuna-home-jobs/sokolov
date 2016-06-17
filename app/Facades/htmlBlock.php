<?php

namespace App\Facades;

use App;
use App\Models\Block;
use Illuminate\Support\Facades\Facade;

class htmlBlock extends Facade
{
    /**
     * @param $BlockId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public static function getGoodSlider($BlockId)
    {
        $Block = Block::find($BlockId);

        if (is_null($Block)) {
            return;
        }

        $Elements = $Block->getElements()->where('lang', App::getLocale())->get();

        if ($Elements->count() == 0) {
            return;
        }

        return view('htmlBlock.GoodsSlider', [
            'Elements' => $Elements,
        ]);
    }

    /**
     * @param int $BlockId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public static function getMainSlider($BlockId = 4)
    {
        $Block = Block::find($BlockId);
        $Elements = $Block->getElements()->where('lang', App::getLocale())->get();

        if ($Elements->count() == 0) {
            return;
        }

        return view('htmlBlock.MainSlider', [
            'Elements' => $Elements,
        ]);
    }
}
