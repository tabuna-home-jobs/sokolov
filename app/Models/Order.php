<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Order.
 *
 * @property-read \App\Models\Category $category
 */
class Order extends Model
{
    use Authenticatable, CanResetPassword, Sortable;

    /**
     * @var array
     *            Поля по которым будем сортировать
     */
    protected $sortable = [
        'id',
        'name',
        'price',
        'status',
        'created_at',
        'updated_at',
        'sold',
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
        'act',
        'name',
        'user_id',
        'OrderFile',
        'status',
        'price',
        'workfinish',
        'text',
        'izdanie',
        'sold',
        'LangOrder_id',
        'icon',
        'price_rub',
    ];

    /**
     * @var array
     *            Мутатор преобразования
     */
    protected $casts = [
        'sold' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at', 'disabled_at', 'workfinish'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getLangTranslite()
    {
        return $this->hasOne(LangOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getGoods()
    {
        return $this->hasMany('App\Models\MetaOrder', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getTask()
    {
        return $this->hasMany('App\Models\Task');
    }
}
