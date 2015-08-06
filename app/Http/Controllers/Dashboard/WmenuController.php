<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Input;
use Session;
use App\Models\Menu;
use App\Models\MenuItem;
use View;

class WmenuController extends Controller
{
    public function wmenuindex()
    {
        $menuitems = new MenuItem();
        $menulist = Menu::lists("name", "id");
        $menulist[0] = "Выберите меню";
        if (Input::has("action")) {
            return View::make('dashboard/menu/menu')->with("menulist", $menulist);
        } else {
            $menu = Menu::find(Input::get("menu"));
            $menus = $menuitems->getall(Input::get("menu"));
            return View::make('dashboard/menu/menu')->with("menus", $menus)->with("indmenu", $menu)->with("menulist", $menulist);
        }
    }

    public function createnewmenu()
    {
        $menu = new Menu();
        $menu->name = Input::get("menuname");
        $menu->save();
        return json_encode(array("resp" => $menu->id));
    }

    public function deleteitemmenu()
    {
        $menuitem = MenuItem::find(Input::get("id"));
        $menuitem->delete();
    }

    public function deletemenug()
    {
        $menus = new MenuItem();
        $getall = $menus->getall(Input::get("id"));
        if (count($getall) == 0) {
            $menudelete = Menu::find(Input::get("id"));
            $menudelete->delete();
            return json_encode(array("resp" => "Вы удалили этот элемент"));
        } else {
            return json_encode(array("resp" => "Вы должны сначала удалить все элементы", "error" => 1));
        }
    }

    public function updateitem()
    {
        $menuitem = MenuItem::find(Input::get("id"));
        $menuitem->label = Input::get("label");
        $menuitem->link = Input::get("url");
        $menuitem->class = Input::get("clases");
        $menuitem->save();
    }

    public function addcustommenu()
    {
        $menuitem = new MenuItem();
        $menuitem->label = Input::get("labelmenu");
        $menuitem->link = Input::get("linkmenu");
        $menuitem->menu = Input::get("idmenu");
        $menuitem->save();
    }

    public function generatemenucontrol()
    {
        $menu = Menu::find(Input::get("idmenu"));
        $menu->name = Input::get("menuname");
        $menu->save();
        foreach (Input::get("arraydata") as $value) {
            $menuitem = MenuItem::find($value["id"]);
            $menuitem->parent = $value["parent"];
            $menuitem->sort = $value["sort"];
            $menuitem->depth = $value["depth"];
            $menuitem->save();
        }
        echo json_encode(array("resp" => 1));
    }
}