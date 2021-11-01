<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cocur\Slugify\Slugify;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-protected');
        $items = Tag::paginate(8);
        return view('admin.tag.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slugifi = new Slugify();
        $this->validator($request->all(), null)->validate();
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $slugifi->slugify($request->name);
        $tag->save();
        return redirect()
            ->route('admin.tag.index')
            ->with('success', 'Новый тег блога успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validator($request->all(), $tag->id)->validate();
        $tag->update($request->all());
        return redirect()
            ->route('admin.tag.index')
            ->with('success', 'Тег блога был успешно исправлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()
            ->route('admin.tag.index')
            ->with('success', 'Тег блога был успешно удален');
    }

    private function validator($data, $id) {
        $rules = [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
        ];
        $messages = [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
        ];
        $attributes = [
            'name' => 'Наименование',
            'slug' => 'ЧПУ (англ.)'
        ];
        return Validator::make($data, $rules, $messages, $attributes);
    }
}
