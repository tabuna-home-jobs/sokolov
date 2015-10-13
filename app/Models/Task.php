<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Skills
 *
 */
class Task extends Model
{


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
        'pause'
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