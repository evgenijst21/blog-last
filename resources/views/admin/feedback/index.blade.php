@extends('admin.layouts_admin.layout', ['title' => 'Заявки'])


@section('content')

            <div class="heading-h">
                <h1 class="heading">Заявки</h1>
            </div>
            <div class="main-filter">
                <form method="GET" action="{{ route('admin.feedback.filter') }}">
                    <div class="text-field text-field_floating-3">
                        <input class="text-field__input" type="date" id="calendar_from" name="calendar_from" value="{{ old('calendar_from') ?? '' }}">
                        <label class="text-field__label" for="calendar_from">От:</label>
                    </div>
                    <div class="text-field text-field_floating-3">
                        <input class="text-field__input" type="date" id="calendar_before" name="calendar_before" value="{{ old('calendar_before') ?? date('Y-m-d') }}">
                        <label class="text-field__label" for="calendar_before">До:</label>
                    </div>
                    <div class="text-field text-field_floating-3">
                        <input type="submit" value="Поиск" class="input-filter">
                    </div>
                </form>
            </div>
            
            @if ($feedbacks->count())
            <div class="main-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Время</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Сообщение</th>
                            <th>IP адресс</th>
                            <th>Открыть</th>
                            @can('view-protected')
                            <th>Удалить</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($feedback->created_at)) }}</td>
                            <td>{{ date('H:i:s', strtotime($feedback->created_at)) }}</td>
                            <td>{{ $feedback->name }}</td>
                            <td>{{ $feedback->email }}</td>
                            <td>{{ mb_substr($feedback->text, 0, 30) }}</td>
                            <td>{{ $feedback->ip }}</td>
                            <td><a href="{{ route('admin.feedback.single', ['id' => $feedback->id]) }}" class="table-link">Подробнее... </a></td>
                            @can('view-protected')
                            <td>
                                <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback->id]) }}"
                                    method="post" onsubmit="return confirm('Удалить эту заявку?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="sub-delete">
                                        <i class="far fa-trash-alt" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        
@endsection
