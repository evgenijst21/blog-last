<div class="card mb-4">
    <div class="card-header">
        <h2>{{ $post->name }}</h2>
    </div>
    <div class="card-body">
        <img src="{{ asset('storage/post/image/'.$post->image)}}" alt="" class="img-fluid">
        <p class="mt-3 mb-0">{{ $post->excerpt }}</p>
    </div>
    <div class="card-footer">
        <div class="clearfix">
            <span class="float-left">
                <br>
                Дата: {{ $post->created_at }}
            </span>
            <span class="float-right">
                <a href="{{ route('blog.post', ['post' => $post->slug]) }}"
                   class="btn btn-dark">Читать дальше</a>
            </span>
        </div>
    </div>
    @if ($post->tags->count())
        <div class="card-footer">
            Теги:
            @foreach($post->tags as $tag)
                @php $comma = $loop->last ? '' : ' • ' @endphp
                <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                {{ $comma }}
            @endforeach
        </div>
    @endif
</div>