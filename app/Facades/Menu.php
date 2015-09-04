<?php namespace App\Facades;


use App\Models\Menu as SiteMenu;
use Illuminate\Support\Facades\Facade;

class Menu  extends Facade {

    static function getLI($NameMenu,$pref = "")
    {
        $menu = SiteMenu::where('name', $NameMenu)->first();
        if (is_null($menu))
            return false;


        $element = $menu->getElement()->get();
        $html = '';
        foreach($element as $li)
        {
            $html .= "<li class='$li->class'><a href='$li->link'> $pref $li->label</a></li>";
        }

        return $html;
    }

}
