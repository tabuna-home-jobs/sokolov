<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MetaOrder.
 *
 * @property-read \App\Models\Category $category
 */
class MetaOrder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orderMeta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'category_id',
        'speed',
    ];

    public function getOrder()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function getGood()
    {
        return $this->belongsTo('App\Models\Goods', 'category_id');
    }
}
