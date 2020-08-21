<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use Sluggable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title', 'content', 'date', 'description'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // Связи! Эти методы дают возможность работать
    // с сущностью через методы классов:
    // $post = Post::find(1);
    // $post->category->title   // название категории
    // $post->author->email     // эл. адрес пользователя

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    // Методы реализующие бизнес-логику
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }


    // Методы для работы с картинками
    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();

        $filename = uniqid(Str::random(5)) . '.' . $image->extension();
        $image->storeAs('uploads/images', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/images/' . $this->image);
        }
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }

        return '/uploads/images/' . $this->image;
    }

    // Доп параметры поста
    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }

        $this->category_id = $id;
        $this->save();

        // $category = Category::find($id);
        // $this->category()->save($category);
    }

    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function setFeatured()
    {
        $this->is_featured = true;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = false;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null) {
            return $this->setStandart();
        }

        return $this->setFeatured();
    }

    public function getCategoryTitle()
    {
        if ($this->category !== null) {
            return $this->category->title;
        }
    }

    public function getTagsTitles()
    {
        if (!$this->tags->isEmpty()) {
            $tags = $this->tags->pluck('title')->all();
            return implode(', ', $tags);
        }
    }

    public function getDateAttribute($value)
    {
        if ($value !== null) {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();

        return self::findOrFail($postID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();

        return self::findOrFail($postID);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }
}
