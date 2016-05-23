<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News.
 */
class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'name', 'content', 'avatar', 'datetime', 'tag', 'descript', 'lang'];
}
