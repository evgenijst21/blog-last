<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Наименование</label>
    <input id="name_post" type="text" class="form-control" name="name" placeholder="..."
           required maxlength="100" value="{{ old('name') ?? $category->name ?? '' }}">
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">ЧПУ (на англ.)</label>
    <input id="slug" type="text" class="form-control" name="slug" placeholder="..."
           required maxlength="100" value="{{ old('slug') ?? $category->slug ?? '' }}">
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Категория</label>
    @php
        $category_id = old('category_id') ?? $category->category_id ?? 0;
    @endphp
    <select name="category_id" class="form-control" title="Родитель">
        <option value="0">Без родителя</option>
        @include('admin.part.parents', ['level' => -1, 'parent' => 0])
    </select>
</div>
<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Краткое описание</label>
    <textarea class="form-control" name="content" placeholder="..." maxlength="500"
              rows="5">{{ old('content') ?? $category->content ?? '' }}</textarea>
</div>
<div class="form-group mb-3">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($category->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset
<div class="form-group mb-3">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>