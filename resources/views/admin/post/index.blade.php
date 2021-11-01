@extends('admin.layouts_admin.layout', ['title' => 'Все посты блога'])

@section('content')
<div class="heading-h">
    <h1 class="heading">Все посты блога</h1>
</div>

<div class="search">
    <form class="search-form" method="GET" action="{{ route('admin.search') }}" >
        <div class="input-group">
            <input id="search" name="search" class="serach-input" type="text" placeholder="Поиск по категориям" aria-label="Поиск по категориям"/>
            <button class="search-button" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

    @if ($category->count())
    <div class="bar">
        <ul class="post_categories">
            @foreach ($category as $root)
                <li>
                    <button class="btn">
                        <a href="{{ route('admin.post.category', ['category' => $root->id]) }}">
                            {{ $root->name }}
                        </a>
                    </button>
                </li>
            @endforeach
            </ul>
    </div>
    @endif
    
    @if ($posts->count())
    <div class="main-table">
        <table class="table">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Наименование</th>
                <th>description</th>
                <th>Title</th>
                <th>Ключевые слова</th>
                
                <th>Предварительный просмотр</th>
                <th>Публикация on/off</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            </thead>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ mb_substr($post->name, 0, 30) }}</td>
                    <td>{{ iconv_strlen($post->excerpt) }}</td>
                    
                    <td>{{ iconv_strlen($post->seo_title) }}</td>
                    <td>{{ iconv_strlen($post->seo_keyword) }}</td>
                    <td>
                        
                            <a href="{{ route('admin.post.show', ['post' => $post->id]) }}" class="co-blue"
                               title="Предварительный просмотр">
                                <i class="far fa-eye"></i>
                            </a>
                        
                    </td>
                    <td>
                        
                            @if ($post->isVisible())
                                <a href="{{ route('admin.post.disable', ['post' => $post->id]) }}" class="co-blue"
                                   title="Запретить публикацию">
                                    <i class="fas fa-toggle-on"></i>
                                </a>
                            @else
                                <a href="{{ route('admin.post.enable', ['post' => $post->id]) }}" class="co-blue"
                                   title="Разрешить публикацию">
                                    <i class="fas fa-toggle-off"></i>
                                </a>
                            @endif
                       
                    </td>
                    <td>
                        
                            <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}" class="co-blue"> 
                                <i class="far fa-edit"></i>
                            </a>
                        
                    </td>
                    <td>
                        
                            <form action="{{ route('admin.post.destroy', ['post' => $post->id]) }}"
                                  method="post" onsubmit="return confirm('Удалить этот пост?')">
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
    {{ $posts->links() }}
    @endif
    <div class="sub-block">
        <button class="btn single-btn" type="button"><a href="{{ route('admin.post.create') }}" 
            class="btn co-white">
            Создать пост</a></button>
    </div>
       
    
@endsection