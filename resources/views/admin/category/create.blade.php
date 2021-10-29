@extends('admin.layouts_admin.layout', ['title' => 'Создать категорию'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Создать категорию</h1>
</div>
   
<div class="create-cat">
    <form method="post" action="{{ route('admin.category.store') }}"
          enctype="multipart/form-data">
        @csrf
        @include('admin.category.part.form')
    </form>
</div>
@endsection