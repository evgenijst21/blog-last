<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="name" name="name" required maxlength="100"
        value="{{ old('name') ?? $post->name ?? '' }}">
    <label class="text-field__label" for="name">Наименование</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="seo_title" name="seo_title" required maxlength="100"
        value="{{ old('seo_title') ?? $post->seo_title ?? '' }}">
    <label class="text-field__label" for="seo_title">Title (SEO)</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="seo_desc" name="seo_desc" required maxlength="100"
        value="{{ old('seo_desc') ?? $post->seo_desc ?? '' }}">
    <label class="text-field__label" for="seo_desc">Description (SEO)</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="seo_keyword" name="seo_keyword" required maxlength="100"
        value="{{ old('seo_keyword') ?? $post->seo_keyword ?? '' }}">
    <label class="text-field__label" for="seo_keyword">Keywords (SEO)</label>
</div>

<div class="ftext-field text-field_floating-3">
    @php
        $category_id = old('category_id') ?? $post->category_id ?? 0;
    @endphp
    <select name="category_id" class="text-field__input" title="Категория">
        <option value="0">Выберите</option>
        @include('admin.part.categories', ['level' => -1, 'parent' => 0])
    </select>
    <label class="text-field__label" for="category_id">Категория</label>
</div>

<div class="ftext-field text-field_floating-3 mt-20">
    <label for="excerpt" class="co-blue">
        <h3>Анонс поста</h3>
    </label>
    <textarea class="form-control" name="excerpt" id="editor_desc" placeholder="..."
              required maxlength="500">{{ old('excerpt') ?? $post->excerpt ?? '' }}</textarea>
</div>
<div class="ftext-field text-field_floating-3 mt-20">
    <label for="content" class="co-blue">
        <h3>Текст поста</h3>
    </label>
    
    <textarea class="form-control" name="content" id="editor_text" placeholder="..."
              required rows="4">{{ old('content') ?? $post->content ?? '' }}</textarea>
</div>

<div class="field__wrapper">

    <input type="file" name="image" id="field__file-2" class="field field__file" accept="image/png, image/jpeg">

    <label class="field__file-wrapper" for="field__file-2">
        <div class="field__file-button">Выбрать</div>
        <div class="field__file-fake">Файл не вбран</div>
    </label>

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

<div class="form-group">
    <button type="submit" class="btn btn-create co-white">Сохранить</button>
</div>