<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // Эти методы дают возможность работать
    // с сущностью через методы классов:
    // $post = Post::find(1);
    // $post->category->title   // название категории
    // $post->author->email     // эл. адрес пользователя
    
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,     // модель связи
            'post_tags',    // таблица связи
            'post_id',      // id этой модели
            'tag_id'        // id связываемой модели
        );
    }

}
