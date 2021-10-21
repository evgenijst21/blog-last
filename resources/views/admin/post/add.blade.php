@extends('admin.layouts_admin.layout', ['title' => 'Новый пост'])

@section('content')
    <h1>Новый пост</h1>
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
          action="{{ route('admin.post.store') }}">
        @include('admin.post.part.form')
    </form>
@endsection