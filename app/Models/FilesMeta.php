<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilesMeta.
 */
class FilesMeta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'FilesMeta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'files_id', 'task_id'];

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getFiles()
    {
        return $this->belongsTo('App\Models\Files', 'files_id');
    }
}
