<?php namespace App\Facades;


use App\Models\Menu as SiteMenu;
use Illuminate\Support\Facades\Facade;

class Menu  extends Facade {

    static function getLI($NameMenu,$pref = "")
    {
        $menu = SiteMenu::where('name', $NameMenu)->first();
        if (is_null($menu))
            return false;

        $element = $menu->getElement()
            ->with('getParent')
            ->where('depth', 0)
            ->orderBy('sort', 'ASC')
            ->get();


        return view('htmlBlock.menu', [
            'Elements' => $element,
            'pref' => $pref
        ]);
    }

    static function getLINoTemplate($NameMenu, $pref = "")
    {
        $menu = SiteMenu::where('name', $NameMenu)->first();
        if (is_null($menu)) {
            return false;
        }

        $element = $menu->getElement()
            ->with('getParent')
            ->where('depth', 0)
            ->orderBy('sort', 'ASC')
            ->get();


        //dd($element);

        return $element;

    }



}
