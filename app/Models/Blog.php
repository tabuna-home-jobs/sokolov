<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 */
class Blog extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'name', 'content', 'avatar', 'datetime', 'tag', 'descript','lang','author'];





}
