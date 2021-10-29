@extends('admin.layouts_admin.layout', ['title' => 'Создание тега'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Создание тега</h1>
</div>
<div class="create-cat">
    <form method="post" action="{{ route('admin.tag.store') }}">
        @csrf

        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name"
                value="">
            <label class="text-field__label" for="name">Наименование</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-create co-white">Сохранить</button>
        </div>
    </form>
</div>
@endsection