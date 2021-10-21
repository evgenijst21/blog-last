@extends('admin.layouts_admin.layout', ['title' => 'Создание тега'])

@section('content')
    <h1>Создание тега</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('admin.tag.store') }}">
        @csrf
        <div class="form-group mb-3">
            <input id="name_post" type="text" class="form-control" name="name" placeholder="Наименование"
                   required maxlength="50" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group mb-3">
            <input id="slug" type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
                   required maxlength="50" value="{{ old('slug') ?? '' }}">
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection