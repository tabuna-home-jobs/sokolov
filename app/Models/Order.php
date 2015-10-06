<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Order
 *
 * @property-read \App\Models\Category $category
 */
class Order extends Model {

    use Authenticatable, CanResetPassword, Sortable;

    /**
     * @var array
     * Поля по которым будем сортировать
     */
    protected $sortable = [
        'id',
        'status',
        'created_at',
        'updated_at'
    ];

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
        'sold',
        'LangOrder_id'
    ];


    protected $dates = ['created_at', 'updated_at', 'disabled_at', 'workfinish'];


    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function getLangTranslite()
    {
        return $this->hasOne(LangOrder::class);
    }

    public function getGoods()
    {
        return $this->hasMany('App\Models\MetaOrder', 'order_id');
    }

    public function getTask()
    {
        return $this->hasMany('App\Models\Task');
    }



}
