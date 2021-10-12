@extends('admin.layouts_admin.layout', ['title' => 'Новый пост'])

@section('content')
    <h1>Новый пост</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.post.store') }}">
        @include('admin.post.part.form')
    </form>
@endsection