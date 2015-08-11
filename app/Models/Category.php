<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'name', 'text', 'tag', 'descript', 'avatar', 'slug', 'lang'];




    /**
     * Связь категории с товаром
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goods()
    {
       return $this->hasMany('App\Models\Goods');
    }







}
