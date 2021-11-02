@extends('layout.site', ['title' => 'Все посты блога'])

@section('content')
<div class="container">


    <h1 class="mb-3">Все посты блога</h1>
    @foreach ($posts as $post)
        @include('blog.part.post', ['post' => $post])
    @endforeach
    {{ $posts->links() }}

</div>
@endsection