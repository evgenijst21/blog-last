@extends('admin.layouts_admin.layout', ['title' => 'Редактирование поста'])

@section('content')
    <h1>Редактирование поста</h1>
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
          action="{{ route('admin.post.update', ['post' => $post->id]) }}">
        @method('PUT')
        @include('admin.post.part.form')
        
    </form>
@endsection