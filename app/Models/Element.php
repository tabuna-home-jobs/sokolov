<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comments.
 */
class Element extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'element';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'desc', 'img', 'link', 'block_id', 'lang'];

    public function getBlock()
    {
        return $this->belongsTo('App\Models\Block');
    }
}
