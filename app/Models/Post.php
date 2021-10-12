<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'excerpt',
        'seo_title',
        'seo_keyword',
        'content',
        'image',
    ];

    /**
     * Количество постов на странице при пагинации
     */
    protected $perPage = 5;

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function editor() {
        return $this->belongsTo(User::class, 'published_by');
    }


    public function enable() {
        $this->published_by = auth()->user()->id;
        $this->update();
    }

    public function disable() {
        $this->published_by = null;
        $this->update();
    }

    public function isVisible() {
        return ! is_null($this->published_by);
    }

    public function scopePublished($builder) {
        return $builder->whereNotNull('published_by');
    }
}
