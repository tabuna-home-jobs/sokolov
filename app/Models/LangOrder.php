<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LangOrder.
 */
class LangOrder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'langOrder';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'eng_name'];

    /**
     * Связь категории с товаром
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getOrder()
    {
        return $this->hasMany(Order::class);
    }
}
