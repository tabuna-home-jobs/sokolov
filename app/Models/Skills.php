<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skills.
 */
class Skills extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
