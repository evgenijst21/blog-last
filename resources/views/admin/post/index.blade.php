@extends('admin.layouts_admin.layout', ['title' => 'Все посты блога'])

@section('content')

<h1>Все посты блога</h1>
<form class="d-md-inline-block form-inline mb-md-4" method="GET" action="{{ route('admin.search') }}" >
    <div class="input-group">
        <input id="search" name="search" class="form-control" type="text" placeholder="Поиск по категориям" aria-label="Поиск по категориям"/>
        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>
    @if ($category->count())
        <ul>
        @foreach ($category as $root)
            <li>
                <a href="{{ route('admin.post.category', ['category' => $root->id]) }}">
                    {{ $root->name }}
                </a>
            </li>
        @endforeach
        </ul>
    @endif
    <a href="{{ route('admin.post.create') }}" class="btn btn-success mb-4">
        Создать пост
    </a>
    @if ($posts->count())
        <table class="table table-bordered">
            <tr>
                <th width="10%">Дата</th>
                <th width="25%">Наименование</th>
                <th width="25%">description</th>
                <th width="10%">Title</th>
                <th width="10%">Ключевые слова</th>
                
                <th><i class="fas fa-eye"></i></th>
                <th><i class="fas fa-toggle-on"></i></th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ iconv_strlen($post->excerpt) }}</td>
                    
                    <td>{{ iconv_strlen($post->seo_title) }}</td>
                    <td>{{ iconv_strlen($post->seo_keyword) }}</td>
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
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                            @else
                                <a href="{{ route('admin.post.enable', ['post' => $post->id]) }}"
                                   title="Разрешить публикацию">
                                    <i class="fas fa-toggle-off"></i>
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
                                <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $posts->links() }}
    @endif
@endsection