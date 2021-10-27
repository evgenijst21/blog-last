<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Имя</label>
    <input id="name_post" type="text" class="form-control" name="name" placeholder="..."
            value="{{ old('name') ?? $user->name ?? '' }}">
</div>

<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Фамилия)</label>
    <input id="sur_name" type="text" class="form-control" name="sur_name" placeholder="..."
            value="{{ old('seo_title') ?? $user->sur_name ?? '' }}">
</div>

<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Логин</label>
    <input id="login" type="text" class="form-control" name="login" placeholder="..."
            value="{{ old('login') ?? $user->login ?? '' }}">
</div>

<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Пароль</label>
    <input id="password" type="text" class="form-control" name="password" placeholder="..."
            value="">
</div>

<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Повторите пароль</label>
    <input id="password_confirmation" type="text" class="form-control" name="password_confirmation" placeholder="..."
            value="">
</div>

<div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Роль</label>
    
    <select name="role_id" class="form-control" title="Родитель">
        @foreach ($roles as $role)
        <option selected value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group mb-3">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>