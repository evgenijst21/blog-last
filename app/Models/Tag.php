<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts() {
        return $this->belongsToMany(Post::class)->withTimestamps();;
    }

    public static function popular() {
        return self::withCount('posts')->orderByDesc('posts_count')->limit(10)->get();
    }
}
