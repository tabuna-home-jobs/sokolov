<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Menu extends Model {



    public function getElement()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu');
    }

}