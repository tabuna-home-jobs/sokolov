<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'text', 'type', 'beglouto'];












}
