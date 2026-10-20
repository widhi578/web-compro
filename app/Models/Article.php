<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'image',
        'image_alt',
        'reading_time',
        'is_published',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }
}
