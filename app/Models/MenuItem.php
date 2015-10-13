<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\MenuItem
 *
 */
class MenuItem extends Model {


    protected $table = 'menuitems';

    protected $fillable = [
        'label',
        'link',
        'parent',
        'sort',
        'menu',
        'depth'
    ];


    public function getParent()
    {
        return $this->hasMany(MenuItem::class, 'parent');
    }


    public function getsons($id) {
        return $this -> where("parent", $id) -> get();
    }
    public function getall($id) {
        return $this -> where("menu", $id) -> orderBy("sort", "asc") -> get();
    }
}