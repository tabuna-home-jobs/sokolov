<?php

namespace app\Services\orchid\seo\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\orchid\seo\Traits\SeoTrait;
use Route;

class SEO extends Model
{
    use SeoTrait;

    protected $table = 'seo';

    protected $fillable = [
        'story_id',
        'url',
        'route',
        'title',
        'description',
        'keywords',
        'robots',
        'image',
        'video',
        'audio',
        'custom',
    ];

    protected $casts = [
        'custom' => 'array',
        'image' => 'array',
    ];
}
