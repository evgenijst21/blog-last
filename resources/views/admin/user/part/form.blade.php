<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="name" name="name"
        value="{{ old('name') ?? $user->name ?? '' }}">
    <label class="text-field__label" for="name">Имя:</label>
</div>


<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="sur_name" name="sur_name"
        value="{{ old('sur_name') ?? $user->sur_name ?? '' }}">
    <label class="text-field__label" for="sur_name">Фамилия:</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="login" name="login"
        value="{{ old('login') ?? $user->login ?? '' }}">
    <label class="text-field__label" for="login">Логин:</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="password" name="password"
        value="">
    <label class="text-field__label" for="password">Пароль:</label>
</div>

<div class="text-field text-field_floating-3">
    <input class="text-field__input" type="text" id="password_confirmation" name="password_confirmation"
        value="">
    <label class="text-field__label" for="password_confirmation">Повторите пароль:</label>
</div>

<div class="text-field text-field_floating-3">
    <select name="role_id" class="text-field__input" title="Родитель">
        @foreach ($roles as $role)
        <option selected value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <label class="text-field__label" for="role_id">Роль</label>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-create co-white">Сохранить</button>
</div>