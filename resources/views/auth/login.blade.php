@extends('layout.site', ['title' => 'Вход в личный кабинет'])

@section('content')
    <div class="container">
        
        <form method="post" action="{{ route('auth.auth') }}" class="feedback">
            <h2>Вход в личный кабинет</h2>
            @csrf
            <div class="form-group">
                <p> Ваш логин 
                <input type="text" class="input" name="login" required maxlength="255"
                    value="{{ old('login') ?? '' }}"> </p>
            </div>
            <div class="form-group">
                <p>Пароль<input type="password" class="input" name="password" required maxlength="255"
                    value=""> </p>
            </div>
            <div class="form-group">
                <button type="submit" class="form-sbm">Войти</button>
            </div>
        </form>
    </div>
@endsection
