@extends('admin.layouts_admin.layout', ['title' => 'Редактирование категории'])

@section('content')
    <h1>Редактирование категории</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.category.update', ['category' => $category->id]) }}">
        @csrf
        @method('PUT')
        @include('admin.category.part.form')
    </form>
@endsection