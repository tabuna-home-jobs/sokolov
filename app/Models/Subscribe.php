<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscribe.
 */
class Subscribe extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscribe';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
    ];
}
