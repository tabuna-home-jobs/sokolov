<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shares.
 */
class Shares extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shares';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'content',
        'avatar',
        'start',
        'end',
        'tag',
        'descript',
        'lang',
        'slug',
    ];
}
