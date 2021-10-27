@extends('admin.layouts_admin.layout', ['title' => 'Обратная связь'])


@section('content')
<h1>Сообщения</h1>
@if ($feedbacks->count())
<table class="table">
    <tr>
        <th width="10%">Дата</th>
        <th width="25%">Имя</th>
        <th width="25%">email</th>
        <th width="10%">Сообщение</th>
        <th width="10%">IP</th>
        <th><i class="fas fa-trash-alt"></i></th>
    </tr>
    @foreach ($feedbacks as $feedback)
        <tr>
            <td>{{ $feedback->created_at }}</td>
            <td><a href="{{ route('admin.feedback.single', ['id' => $feedback->id]) }}">{{ $feedback->name }}</a></td>
            <td>{{ $feedback->email }}</td>
            <td>{{ $feedback->text }}</td>
            <td>{{ $feedback->ip }}</td>
            <td>
                
                    <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback->id]) }}"
                          method="post" onsubmit="return confirm('Удалить это сообщение?')">
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
{{ $feedbacks->links() }}
@endif


@endsection