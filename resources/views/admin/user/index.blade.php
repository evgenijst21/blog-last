@extends('admin.layouts_admin.layout', ['title' => 'Пользователи'])

@section('content')

    <div class="heading-h">
        <h1 class="heading">Пользователи</h1>
    </div>
    <div class="sub-block">
        <button class="single-btn" type="button"><a href="{{ route('admin.user.create') }}" 
            class="co-blue"><i class="fa fa-plus" aria-hidden="true"></i>
            Новый пользователь</a></button>
    </div>
    <div class="main-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Логин</th>
                    <th>Роль</th>
                    <th>Удалить</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->sur_name }}</td>
                        <td>{{ $user->login }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="post"
                                onsubmit="return confirm('Удалить этого пользователя?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="sub-delete">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    {{ $users->links() }}
@endsection
