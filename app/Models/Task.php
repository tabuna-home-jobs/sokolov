<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Skills.
 */
class Task extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_id',
        'goods_id',
        'name',
        'workfinish',
        'countWork',
        'price',
        'status',
        'spent',
        'pause',
        'payment',
    ];

    protected $sortable = [
        'id',
        'name',
        'workfinish',
        'created_at',
        'price',
    ];

    protected $casts = [
        'payment' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at', 'disabled_at', 'workfinish', 'pause'];

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getGoods()
    {
        return $this->belongsTo('App\Models\Category', 'goods_id');
    }

    public function getOrder()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function getFileMeta()
    {
        return $this->hasMany('App\Models\FilesMeta');
    }
}
