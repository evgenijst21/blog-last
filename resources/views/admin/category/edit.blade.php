@extends('admin.layouts_admin.layout', ['title' => 'Редактирование категории'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Редактирование категории</h1>
</div>
<div class="create-cat">
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.category.update', ['category' => $category->id]) }}">
        @csrf
        @method('PUT')
        @include('admin.category.part.form')
    </form>
</div>
@endsection