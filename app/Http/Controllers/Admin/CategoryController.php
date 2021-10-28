<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Helpers\ImageSaver;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Cocur\Slugify\Slugify;


class CategoryController extends Controller
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
        $this->authorize('view-protected');
        $items = Category::all();
        return view('admin.category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(CategoryRequest $request)
    {
        $slugifi = new Slugify();
        $category = new Category();
        $category->fill($request->except('image'));
        $category->image = $this->imageSaver->upload($category, 370, 250);
        $category->slug = $slugifi->slugify($request->name);
        $category->seo_title = $request->seo_title;
        $category->seo_keyword = $request->seo_keyword;
        $category->desc = $request->desc;
        $category->save();
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Новая категория успешно создана');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория была успешно исправлена');
    }

    public function destroy(Category $category)
    {
        if ($category->children->count()) {
            $errors = 'Нельзя удалить категорию у которой есть дочерние категориями';
        }
        if ($category->posts->count()) {
            $errors = 'Нельзя удалить категорию, которая содержит посты';
        }
        if (!empty($errors)) {
            return back()->with('success', $errors);
        }
        $category->delete();
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория блога успешно удалена');
    }
    
}
