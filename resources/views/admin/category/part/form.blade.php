<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="name" name="name"
        value="{{ old('name') ?? ($category->name ?? '') }}">
    <label class="text-field__label" for="name">Наименование</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="seo_title" name="seo_title"
        value="{{ old('seo_title') ?? ($category->seo_title ?? '') }}">
    <label class="text-field__label" for="seo_title">Title (SEO)</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="seo_keyword" name="seo_keyword"
        value="{{ old('seo_keyword') ?? ($category->seo_keyword ?? '') }}">
    <label class="text-field__label" for="seo_keyword">Keyword (SEO)</label>
</div>

<div class="text-field text-field_floating-3">

    @php
        $category_id = old('category_id') ?? ($category->category_id ?? 0);
    @endphp
    <select name="category_id" class="text-field__input" title="Родитель">
        <option value="0">Без родителя</option>
        @include('admin.part.parents', ['level' => -1, 'parent' => 0])
    </select>
    <label class="text-field__label" for="category_id">Категория</label>
</div>

<div class="ftext-field text-field_floating-3 mt-20">
    <label for="desc" class="co-blue">
        <h3>Описание категории</h3>
    </label>
    <textarea class="form-control" name="desc" id="editor_cat" placeholder="..." maxlength="500"
        rows="5">{{ old('desc') ?? ($category->desc ?? '') }}</textarea>
</div>

<div class="field__wrapper">

    <input type="file" name="image" id="field__file-2" class="field field__file" accept="image/png, image/jpeg">

    <label class="field__file-wrapper" for="field__file-2">
        <div class="field__file-button">Выбрать</div>
        <div class="field__file-fake">Файл не вбран</div>
    </label>

</div>

@isset($category->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset
<div class="form-group">
    <button type="submit" class="btn btn-create co-white">Сохранить</button>
</div>
