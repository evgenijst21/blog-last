@extends('admin.layouts_admin.layout')
@section('content')
<h1>{{ $category->name }}</h1>
@isset($category->children)
<ul>
    @foreach ($category->children as $child)
        <li>
            <a href="{{ route('admin.post.category', ['category' => $child->id]) }}">
                {{ $child->name }}
            </a>
        </li>
    @endforeach
</ul>
@endisset

@if ($posts->count())
    <table class="table table-bordered">
        <tr>
            <th width="10%">Дата</th>
            <th width="40%">Наименование</th>
            <th width="20%">Автор публикации</th>
            
            <th><i class="fas fa-eye"></i></th>
            <th><i class="fas fa-toggle-on"></i></th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
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
                    
                        <a href="{{ route('admin.post.show', ['post' => $post->id]) }}"
                           title="Предварительный просмотр">
                            <i class="far fa-eye"></i>
                        </a>
                    
                </td>
                <td>
                    
                        @if ($post->isVisible())
                            <a href="{{ route('admin.post.disable', ['post' => $post->id]) }}"
                               title="Запретить публикацию">
                                <i class="far fa-toggle-on"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.post.enable', ['post' => $post->id]) }}"
                               title="Разрешить публикацию">
                                <i class="far fa-toggle-off"></i>
                            </a>
                        @endif
                    
                </td>
                <td>
                    
                        <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    
                </td>
                <td>
                    
                        <form action="{{ route('admin.post.destroy', ['post' => $post->id]) }}"
                              method="post" onsubmit="return confirm('Удалить этот пост?')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="return" value="back">
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    
                </td>
            </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
@else
    <p>Нет постов в этой категории</p>
@endif
@endsection