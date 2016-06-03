<?php

namespace App\Models;

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

    /**
     * @var
     */
    protected static $goods = self::class;

    /**
     * @var array
     */
    protected $casts = [
        'attribute' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'content',
        'avatar',
        'text',
        'price',
        'category_id',
        'tag',
        'descript',
        'price',
        'attribute',
        'lang',
        'slug',
        'block_id',
        'calculator',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lang()
    {
        return $this->hasOne(static::$goods, 'category_id', 'category_id');
    }
}
