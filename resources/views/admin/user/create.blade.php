@extends('admin.layouts_admin.layout', ['title' => 'Создать нового пользователя'])

@section('content')

<div class="heading-h">
    <h1 class="heading">Сознание нового пользователя</h1>
</div>
<div class="create-cat">
    <form method="post" action="{{ route('admin.user.store') }}"
          enctype="multipart/form-data">
        @csrf
        @include('admin.user.part.form')
    </form>
</div>
@endsection