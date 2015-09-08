<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property-read \App\Models\Category $category
 */
class Order extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'OrderFile',
        'status',
        'price',
        'workfinish',
        'text',
        'izdanie',
        'sold'
    ];


    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


    public function getGoods()
    {
        return $this->hasMany('App\Models\MetaOrder', 'order_id');
    }


}
