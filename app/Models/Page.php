<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page.
 */
class Page extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'content',
        'tag',
        'descript',
        'lang',
        'slug',
    ];
}
