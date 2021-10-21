@extends('admin.layouts_admin.layout', ['title' => 'Создание категории'])

@section('content')
    <h1>Создание категории</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('admin.category.store') }}"
          enctype="multipart/form-data">
        @csrf
        @include('admin.category.part.form')
    </form>
@endsection