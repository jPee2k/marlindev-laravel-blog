<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = [
        'title'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,    // модель связи
            'post_tags',    // таблица связи
            'tag_id',       // id этой модели
            'post_id'       // id связываемой модели
        );
    }
}
