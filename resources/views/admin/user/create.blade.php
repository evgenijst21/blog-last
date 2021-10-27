@extends('admin.layouts_admin.layout', ['title' => 'Создать нового пользователя'])

@section('content')

<h1>Создание пользователя</h1>
    
    <form method="post" action="{{ route('admin.user.store') }}"
          enctype="multipart/form-data">
        @csrf
        @include('admin.user.part.form')
    </form>

@endsection