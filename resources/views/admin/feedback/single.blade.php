@extends('admin.layouts_admin.layout', ['title' => $feedback->theme])

@section('content')
<h1>Сообщение</h1>


<p> Имя: {{ $feedback->name }}</p>
<p> Email: {{ $feedback->email }}</p>
<p> Тема: {{ $feedback->theme }} </p>
<p> Сообщение: {{$feedback->text }} </p>
<p> IP: {{ $feedback->ip }}</p>

<a href="{{ route('admin.feedback.index') }}" class="btn btn-success mb-4">
    Вернуться
</a>
@endsection

