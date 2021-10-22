@csrf
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Наименование</label>
    <input id="name_post" type="text" class="form-control" name="name" placeholder="..."
           required maxlength="100" value="{{ old('name') ?? $post->name ?? '' }}">
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Title (SEO)</label>
    <input type="text" class="form-control" name="seo_title" placeholder="..."
           required maxlength="100" value="{{ old('seo_title') ?? $post->seo_title ?? '' }}">
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Description (SEO)</label>
    <input type="text" class="form-control" name="seo_title" placeholder="..."
           required maxlength="100" value="{{ old('seo_desc') ?? $post->seo_desc ?? '' }}">
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Ключевые слова (SEO)</label>
    <input type="text" class="form-control" name="seo_keyword" placeholder="Ключевые слова"
           required maxlength="100" value="{{ old('seo_keyword') ?? $seo_keyword ?? '' }}">
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Категория</label>
    @php
        $category_id = old('category_id') ?? $post->category_id ?? 0;
    @endphp
    <select name="category_id" class="form-control" title="Категория">
        <option value="0">Выберите</option>
        @include('admin.part.categories', ['level' => -1, 'parent' => 0])
    </select>
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Анонс поста</label>
    <textarea class="form-control" name="excerpt" id="editor_desc" placeholder="..."
              required maxlength="500">{{ old('excerpt') ?? $post->excerpt ?? '' }}</textarea>
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Текст поста</label>
    <textarea class="form-control" name="content" id="editor_text" placeholder="..."
              required rows="4">{{ old('content') ?? $post->content ?? '' }}</textarea>
</div>

<div class="form-group mb-3">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($post->image)
    <div class="form-group form-check mb-3">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset

@include('admin.part.all-tags')

<div class="form-group mb-3">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>