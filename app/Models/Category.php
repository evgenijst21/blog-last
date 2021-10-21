<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'title',
        'content',
        'image',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function children() {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function roots() {
        return self::where('category_id', 0)->with('children')->get();
    }

    public static function descendants($parent) {
        static $items = null;
        if (is_null($items)) {
            $items = self::all();
        }
        $ids = [];
        foreach ($items->where('category_id', $parent) as $item) {
            $ids[] = $item->id;
            $ids = array_merge($ids, self::descendants($item->id));
        }
        return $ids;
    }

    public static function hierarchy() {
        return self::where('category_id', 0)->with('descendants')->get();
    }

}
