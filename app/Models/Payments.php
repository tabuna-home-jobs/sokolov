<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payments
 *
 */
class Payments extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sum',
        'status',
        'users_id',
        'order_id',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getOrder()
    {
        return $this->belongsTo('App\Models\User', 'order_id');
    }
}
