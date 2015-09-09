<?php namespace App\Facades;

use App;
use App\Models\Block;
use Illuminate\Support\Facades\Facade;

class htmlBlock extends Facade
{

    static function getLI($NameMenu, $pref = "")
    {
        $menu = SiteMenu::where('name', $NameMenu)->first();
        if (is_null($menu))
            return false;


        $element = $menu->getElement()->get();
        $html = '';
        foreach ($element as $li) {
            $html .= "<li class='$li->class'><a href='$li->link'> $pref $li->label</a></li>";
        }

        return $html;
    }

    static function getGoodSlider($BlockId)
    {
        $Block = Block::find($BlockId);
        $Elements = $Block->getElements()->where('lang', App::getLocale())->get();

        return view('htmlBlock.GoodsSlider', [
            'Elements' => $Elements
        ]);


    }


}
