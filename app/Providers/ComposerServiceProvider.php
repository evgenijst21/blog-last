<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $views = [
            'layout.part.categories', 
            'admin.part.categories', 
            'admin.part.parents',
            'admin.part.all-ctgs', 
        ];
        View::composer($views, function($view) {
            static $items = null;
            if (is_null($items)) {
                $items = Category::all();
            }
            $view->with(['items' => $items]);
        });
        View::composer('layout.part.popular-tags', function($view) {
            $view->with(['items' => Tag::popular()]);
        });
        View::composer('admin.part.all-tags', function($view) {
            $view->with(['items' => Tag::all()]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
