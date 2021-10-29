@extends('admin.layouts_admin.layout', ['title' => $feedback->theme])

@section('content')
    <div class="heading-h">
        <h1 class="heading">Заявка</h1>
    </div>
    <div class="aplication-info">
        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name" value="{{ $feedback->name }}" disabled>
            <label class="text-field__label" for="name">Имя клиента:</label>
        </div>
        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name" value="{{ $feedback->email }}" disabled>
            <label class="text-field__label" for="name">Email:</label>
        </div>
        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name" value="{{ $feedback->theme }}" disabled>
            <label class="text-field__label" for="name">Тема:</label>
        </div>
        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name" value="{{ $feedback->text }}" disabled>
            <label class="text-field__label" for="name">Сообщение о проблеме:</label>
        </div>
        <div class="text-field text-field_floating-3">
            <input class="text-field__input" type="text" id="name" name="name" value="{{ $feedback->ip }}" disabled>
            <label class="text-field__label" for="name">IP адресс клиента:</label>
        </div>
        <div class="sub-block">
            <button class="btn single-btn" type="button"><a href="{{ route('admin.feedback.index') }}"
                    class="co-white">
                    Вернуться к заявкам
                </a></button>
            @can('view-protected')
                <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback->id]) }}" method="post" class="single-form"
                    onsubmit="return confirm('Удалить эту заявку?')">
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
