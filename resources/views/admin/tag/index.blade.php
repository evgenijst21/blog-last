@extends('admin.layouts_admin.layout', ['title' => 'Все теги блога'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Все теги блога</h1>
</div>
    
    @if ($items->count())
    <div class="main-table">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>ЧПУ (англ.)</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            </thead>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>
                        <a href="{{ route('admin.tag.edit', ['tag' => $item->id]) }}" class="co-blue">
                            <i class="far fa-edit"></i>
                        </a>
                </td>
                <td>
                        <form action="{{ route('admin.tag.destroy', ['tag' => $item->id]) }}"
                              method="post" onsubmit="return confirm('Удалить этот тег?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="sub-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $items->links() }}
    @endif
    <div class="sub-block">
        <button class="btn single-btn" type="button"><a href="{{ route('admin.tag.create') }}" 
            class="btn co-white">
            Создать тег</a></button>
    </div>
        
    
@endsection