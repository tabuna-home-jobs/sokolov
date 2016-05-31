<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Goods[] $goods
 */
class Block extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'block';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Связь категории с товаром
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getElements()
    {
        return $this->hasMany('App\Models\Element');
    }
}
