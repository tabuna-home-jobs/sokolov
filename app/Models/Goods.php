<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Goods.
 *
 * @property-read \App\Models\Category $category
 */
class Goods extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goods';

    protected static $goods = self::class;

    protected $casts = [
        'attribute' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'name', 'content', 'avatar', 'text', 'price', 'category_id', 'tag', 'descript', 'price', 'attribute', 'lang', 'slug', 'block_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function lang()
    {
        return $this->hasOne(static::$goods, 'category_id', 'category_id');
    }
}
