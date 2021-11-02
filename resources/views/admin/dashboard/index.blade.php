@extends('admin.layouts_admin.layout', ['title' => 'Панель приборов'])

@section('content')

    
    <p>Количесвто посетителей сегодня:</p>{{$countToday}}
    <p>Количесвто посетителей за всё время:</p>{{$countAll}}
@endsection