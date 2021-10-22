@extends('admin.layouts_admin.layout', ['title' => $post->name, 'admin' => true])

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h1>
                @if (!$post->isVisible())
                    <i class="far fa-eye-slash text-danger" title="Предварительный просмотр"></i>
                @else
                    <i class="far fa-eye text-success" title="Этот пост опубликован"></i>
                @endif
                {{ $post->name }}
            </h1>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/post/image/'.$post->image)}}" alt="" class="img-fluid" style="max-width: 500px;">
            
                {!! $post->content !!}
            
                <p>{!! $post->excerpt !!}</p>
            
        </div>
        <div class="card-footer d-flex justify-content-between">
            <span>
                <br>
                Дата: {{ $post->created_at }}
            </span>
            <span>
                
                    @if ($post->isVisible())
                        <a href="{{ route('admin.post.disable', ['post' => $post->id]) }}"
                           class="btn btn-dark" title="Запретить публикацию">
                                <i class="fas fa-toggle-on text-success"></i>
                            </a>
                    @else
                        <a href="{{ route('admin.post.enable', ['post' => $post->id]) }}"
                           class="btn btn-dark" title="Разрешить публикацию">
                                <i class="fas fa-toggle-off text-white"></i>
                            </a>
                    @endif
                
                    <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}"
                       class="btn btn-primary" title="Редактировать пост">
                        <i class="far fa-edit"></i>
                    </a>
                
                    <form action="{{ route('admin.post.destroy', ['post' => $post->id]) }}" method="post" class="d-inline" onsubmit="return confirm('Удалить этот пост?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Удалить пост">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                
            </span>
        </div>
        @if ($post->tags->count())
            <div class="card-footer">
                Теги:
                @foreach($post->tags as $tag)
                    @php $comma = $loop->last ? '' : ' • '; @endphp
                    <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}">
                        {{ $tag->name }}</a>
                    {{ $comma }}
                @endforeach
            </div>
        @endif
    </div>
@endsection