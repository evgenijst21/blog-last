@extends('admin.layouts_admin.layout')
@section('content')
    <div class="heading-h">
        <h1>{{ $category->name }}</h1>
    </div>

    @isset($category->children)
        <div class="bar">
        <ul class="post_categories">
            @foreach ($category->children as $child)
                <li>
                    <button class="btn">
                    <a href="{{ route('admin.post.category', ['category' => $child->id]) }}">
                        {{ $child->name }}
                    </a>
                </button>
                </li>
            @endforeach
        </ul>
        </div>
    @endisset

    @if ($posts->count())
    <div class="main-table">
        <table class="table">
            <tr>
                <th>Дата</th>
                <th>Наименование</th>
                <th>Автор публикации</th>

                <th>Предварительный просмотр</th>
                <th>Публикация on/off</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->name }}</td>

                    <td>
                        @if ($post->editor)
                            {{ $post->editor->name }}
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('admin.post.show', ['post' => $post->id]) }}" title="Предварительный просмотр" class="co-blue"> 
                            <i class="far fa-eye"></i>
                        </a>

                    </td>
                    <td>

                        @if ($post->isVisible())
                            <a href="{{ route('admin.post.disable', ['post' => $post->id]) }}"
                                title="Запретить публикацию" class="co-blue">
                                <i class="fas fa-toggle-on"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.post.enable', ['post' => $post->id]) }}"
                                title="Разрешить публикацию" class="co-blue">
                                <i class="fas fa-toggle-off"></i>
                            </a>
                        @endif

                    </td>
                    <td>

                        <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}"  class="co-blue">
                            <i class="fas fa-edit"></i>
                        </a>

                    </td>
                    <td>

                        <form action="{{ route('admin.post.destroy', ['post' => $post->id]) }}" method="post"
                            onsubmit="return confirm('Удалить этот пост?')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="return" value="back">
                            <button type="submit" class="sub-delete">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
        {{ $posts->links() }}
    @else
        <p>Нет постов в этой категории</p>
    @endif
@endsection
