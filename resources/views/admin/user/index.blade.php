@extends('admin.layouts_admin.layout', ['title' => 'Пользователи'])

@section('content')

<h1>Все пользователи</h1>
    
<a href="{{ route('admin.user.create') }}" class="btn btn-success mb-4">
    Создать пользователя
</a>

<table class="table table-bordered">
<tr>
    <th width="30%">Имя</th>
    <th width="30%">Фамилия</th>
    <th width="30%">Логин</th>
    <th width="30%">Роль</th>
    <th><i class="fas fa-edit"></i></th>
    <th><i class="fas fa-trash-alt"></i></th>
</tr>
@foreach ($users as $user)
    

<tr>
    <td>
        <span>{{ $user->name }}</span>
    </td>
    <td><span>{{ $user->sur_name }}</span></td>
    <td><span>{{ $user->login }}</span></td>
    <td><span>@foreach ($user->roles as $role)
        {{ $role->name }}
    @endforeach</span></td>
    <td>
        
            <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                <i class="far fa-edit"></i>
            </a>
        
    </td>
    <td>
        
            <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}"
                  method="post" onsubmit="return confirm('Удалить этого пользователя?')">
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
{{ $users->links() }}
@endsection