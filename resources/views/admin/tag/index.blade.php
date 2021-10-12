@extends('admin.layouts_admin.layout', ['title' => 'Все теги блога'])

@section('content')
    <h1>Все теги блога</h1>
    
        <a href="{{ route('admin.tag.create') }}" class="btn btn-success mb-4">
            Создать тег
        </a>
    
    @if ($items->count())
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th width="45%">Наименование</th>
                <th width="45%">ЧПУ (англ.)</th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>
                    
                        <a href="{{ route('admin.tag.edit', ['tag' => $item->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    
                </td>
                <td>
                    
                        <form action="{{ route('admin.tag.destroy', ['tag' => $item->id]) }}"
                              method="post" onsubmit="return confirm('Удалить этот тег?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    
                </td>
            </tr>
            @endforeach
        </table>
        {{ $items->links() }}
    @endif
@endsection