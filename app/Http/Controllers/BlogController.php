<?php

namespace App\Http\Controllers;

use App\Events\PostHasViewed;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     
    // Главная страница блога (список всех постов)
     
    public function index() {
        $posts = Post::where('published_at', '<', now())->orderBy('created_at', 'desc')->paginate(5);
        return view('blog.index', compact('posts'));
    }

    
    // Страница просмотра отдельного поста блога
     
    public function post(Post $post) {
        event(new PostHasViewed($post));
        return view('blog.post', compact('post'));
    }

    
     // Список постов блога выбранной категории
     
    public function category(Category $category) {
        $descendants = array_merge(Category::descendants($category->id), [$category->id]);
        $posts = Post::whereIn('category_id', $descendants)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('blog.category', compact('category', 'posts'));
    }

    
     // Список постов блога с выбранным тегом
     
    public function tag(Tag $tag) {
        $posts = $tag->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('blog.tag', compact('tag', 'posts'));
    }
}
