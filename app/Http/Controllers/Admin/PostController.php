<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Helpers\ImageSaver;
use Cocur\Slugify\Slugify;

class PostController extends Controller
{
    private $imageSaver;

    public function __construct(ImageSaver $imageSaver) {
        $this->imageSaver = $imageSaver;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('category_id', 0)->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.post.index', compact('category', 'posts'));
    }

    public function category(Category $category) {
        $posts = $category->posts()->paginate(20);
        return view('admin.post.category', compact('category', 'posts'));
    }

    public function search(Request $request) 
    {
        $category = Category::where('name', 'LIKE', "%{$request->search}%")->get();
        $posts = Post::whereHas('category', $filter = function($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->search}%"); 
        })
        ->with(['category' => $filter])->paginate(20);
        

        return view('admin.post.index', compact('category', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $slugifi = new Slugify();
        $post = new Post;
        $post->fill($request->except('image'));
        $post->image = $this->imageSaver->upload($post);
        $post->name = $request->name;
        $post->slug = $slugifi->slugify($request->name);
        $post->category_id = $request->category_id;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->seo_title = $request->seo_title;
        $post->seo_keyword = $request->seo_keyword;
        $post->save();
        $route = 'admin.post.index';
        return redirect()
            ->route($route)
            ->with('success', 'Пост был подготовлен к опубликованию');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        session()->flash('preview', 'yes');
        return view('admin.post.show', compact('post'));
    }

    public function enable(Post $post) {
        $post->enable();
        return back()->with('success', 'Пост блога был опубликован');
    }

    public function disable(Post $post) {
        $post->disable();
        return back()->with('success', 'Пост блога снят с публикации');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        session()->keep('preview');
        return view('admin.post.edit', compact('post' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->except(['image', 'tags']);
        $data['image'] = $this->imageSaver->upload($post);
        $post->update($request->all());
        $post->tags()->sync($request->tags);
        $route = 'admin.post.index';
        $param = [];
        if (session('preview')) {
            $route = 'admin.post.show';
            $param = ['post' => $post->id];
        }
        return redirect()
            ->route($route, $param)
            ->with('success', 'Пост был успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        $route = 'admin.post.index';
        if (session('preview')) {
            $route = 'blog.index';
        }
        return redirect()
            ->route($route)
            ->with('success', 'Пост блога успешно удален');
    }
}
