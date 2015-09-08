<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 */
class Review extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'review';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dolshnost',
        'comment',
        'avatar',
        'lang',
    ];


}
