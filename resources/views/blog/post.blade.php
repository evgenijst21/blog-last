@extends('layout.site', ['title' => $post->name])

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h1>{{ $post->name }}</h1>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/post/image/'.$post->image) }}" alt="" class="img-fluid">
            <div class="mt-4">{!! $post->content !!}</div>
        </div>
        <div class="card-footer">
                
                <br>
                Дата: {{ $post->created_at }}
        </div>
        <p>Просмотров: {{$post->view_count}}</p>
        @if ($post->tags->count())
            <div class="card-footer">
                Теги:
                @foreach($post->tags as $tag)
                    @php $comma = $loop->last ? '' : ' • ' @endphp
                    <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}">
                        {{ $tag->name }}</a>
                    {{ $comma }}
                @endforeach
            </div>
        @endif
    </div>
@endsection