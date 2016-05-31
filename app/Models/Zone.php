<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skills.
 */
class Zone extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zone';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zone_id',
        'country_code',
        'zone_name',
    ];
}
