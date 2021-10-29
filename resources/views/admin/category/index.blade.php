@extends('admin.layouts_admin.layout', ['title' => 'Все категории'])

@section('content')
    <div class="heading-h">
        <h1 class="heading">Все категории</h1>
    </div>

    <div class="main-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>seo_description (символов)</th>
                    <th>seo_keyword (символов)</th>
                    <th>seo_title (символов)</th>
                    <th>Изменить</i></th>
                    <th>Удалить</th>
                </tr>
            </thead>
                @include('admin.part.all-ctgs', ['level' => -1, 'parent' => 0])
        </table>
    </div>
    <div class="sub-block">
        <button class="btn single-btn" type="button"><a href="{{ route('admin.category.create') }}" 
            class="btn co-white">
            Создать категорию</a></button>
    </div>
    @endsection
