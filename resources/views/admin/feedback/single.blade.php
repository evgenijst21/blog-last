@extends('admin.layouts_admin.layout', ['title' => $feedback->theme])

@section('content')
    <div class="heading-h">
        <h1 class="heading">Заявка</h1>
    </div>
    <div class="feed-single">
        <div class="feedback-info">
            <span class="co-blue fs-14">Имя клиента:</span><br>
            <span>{{ $feedback->name }}</span>
        </div>
        <div class="feedback-info">
            <span class="co-blue fs-14">Email:</span><br>
            <span>{{ $feedback->email }}</span>
        </div>
        <div class="feedback-info">
            <span class="co-blue fs-14">Тема:</span><br>
            <span>{{ $feedback->theme }}</span>
        </div>
        <div class="feedback-info">
            <span class="co-blue fs-14">Сообщение о проблеме:</span><br>
            <span>{{ $feedback->text }}</span>
        </div>
        <div class="feedback-info">
            <span class="co-blue fs-14">IP адресс клиента:</span><br>
            <span>{{ $feedback->ip }}</span>
        </div>
    </div>
    <div class="sub-block">
        <button class="btn single-btn" type="button"><a href="{{ route('admin.feedback.index') }}" class="co-white">
                Вернуться к заявкам
            </a></button>
        @can('view-protected')
            <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback->id]) }}" method="post"
                class="single-form" onsubmit="return confirm('Удалить эту заявку?')">
                @csrf
                @method('DELETE')
                <button class="btn single-del co-white" type="submit">
                    Удалить заявку
                </button>
            </form>
        @endcan
    </div>
    </div>

@endsection
