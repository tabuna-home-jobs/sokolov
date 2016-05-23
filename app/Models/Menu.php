<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu.
 */
class Menu extends Model
{
    public function getElement()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu');
    }
}
