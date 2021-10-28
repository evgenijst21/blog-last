<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\FeedbackController;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group([
    'as' => 'auth.', 
    'prefix' => 'auth', 
], function () {
    // // форма регистрации
    // Route::get('register', [RegisterController::class, 'register'])
    //     ->name('register');
    // // создание пользователя
    // Route::post('register', [RegisterController::class, 'create'])
    //     ->name('create');
    // форма входа
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');
    // аутентификация
    Route::post('login', [LoginController::class, 'authenticate'])
        ->name('auth');
    // выход
    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');
});

Route::group([
    'as' => 'blog.', 
    'prefix' => 'blog', 
], function () {
    // главная страница (все посты)
    Route::get('index', [BlogController::class, 'index'])
        ->name('index');
    // категория блога (посты категории)
    Route::get('category/{category:slug}', [BlogController::class, 'category'])
        ->name('category');
    // тег блога (посты с этим тегом)
    Route::get('tag/{tag:slug}', [BlogController::class, 'tag'])
        ->name('tag');
    // страница поста блога
    Route::get('post/{post:slug}', [BlogController::class, 'post'])
        ->name('post');
});

Route::post('feedback', [FeedbackController::class, 'store'])
        ->name('feedback.store');

Route::group([
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => ['auth'] 
], function () {
    
    Route::resource('post', 'PostController');
    // доп.маршрут для показа постов категории
    Route::get('post/category/{category}', 'PostController@category')
        ->name('post.category');
    // доп.маршрут, чтобы разрешить публикацию поста
    Route::get('post/enable/{post}', 'PostController@enable')
        ->name('post.enable');
    // доп.маршрут, чтобы запретить публикацию поста
    Route::get('post/disable/{post}', 'PostController@disable')
        ->name('post.disable');
    // CRUD операции для категорий
    Route::resource('category', 'CategoryController', ['except' => 'show']);
    // CRUD операции для тегов
    Route::resource('tag', 'TagController', ['except' => 'show']);
    // маршрут для формы обратной связи
    Route::get('feedback/index', [FeedbackController::class, 'index'])
        ->name('feedback.index');
    Route::get('feedback/filter', [FeedbackController::class, 'filter'])
        ->name('feedback.filter');
    Route::get('feedback/{id}', [FeedbackController::class, 'show'])
        ->name('feedback.single');
    Route::delete('feedback/{feedback}', [FeedbackController::class, 'destroy'])
        ->name('feedback.destroy');
    // поиск категорий
    Route::get('search', 'PostController@search')
        ->name('search');
    // CRUD операции над пользователями
    Route::resource('user', 'UserController');
    
});
