<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Files.
 */
class Files extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'type', 'beglouto', 'finish', 'original'];

    public function getMeta()
    {
        return $this->hasMany('App\Models\FilesMeta');
    }
}
