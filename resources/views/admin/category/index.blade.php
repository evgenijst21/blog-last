@extends('admin.layouts_admin.layout', ['title' => 'Все категории'])

@section('content')
    <h1>Все категории</h1>
    
        <a href="{{ route('admin.category.create') }}" class="btn btn-success mb-4">
            Создать категорию
        </a>
    
    <table class="table table-bordered">
        <tr>
            <th width="45%">Наименование</th>
            <th width="45%">ЧПУ (англ.)</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @include('admin.part.all-ctgs', ['level' => -1, 'parent' => 0])
    </table>
@endsection