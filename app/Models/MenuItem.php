<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuItem.
 */
class MenuItem extends Model
{
    protected $table = 'menuitems';

    protected $fillable = [
        'label',
        'link',
        'parent',
        'sort',
        'menu',
        'depth',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getParent()
    {
        return $this->hasMany(self::class, 'parent');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getsons($id)
    {
        return $this->where('parent', $id)->get();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getall($id)
    {
        return $this->where('menu', $id)->orderBy('sort', 'asc')->get();
    }
}
