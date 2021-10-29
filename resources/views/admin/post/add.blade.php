@extends('admin.layouts_admin.layout', ['title' => 'Новый пост'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Новый пост</h1>
</div>
<div class="create-cat">
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.post.store') }}">
        @csrf
        @include('admin.post.part.form')
    </form>
</div>
@endsection