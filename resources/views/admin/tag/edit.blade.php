@extends('admin.layouts_admin.layout', ['title' => 'Редактирование тега'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Редактирование тега</h1>
</div>
<div class="create-cat">
    <form method="post" action="{{ route('admin.tag.update', ['tag' => $tag->id]) }}">
        @csrf
        @method('PUT')
        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name"
                value="{{ old('name') ?? $tag->name ?? '' }}">
            <label class="text-field__label" for="name">Наименование</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-create co-white">Сохранить</button>
        </div>
    </form>
</div>
@endsection