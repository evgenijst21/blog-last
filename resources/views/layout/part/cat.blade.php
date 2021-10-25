@if ($categories->where('category_id', $parent)->count())
    @foreach ($categories->where('category_id', $parent) as $category)
    <div class="cardContainer inactive">
        <div class="card">
        <div class="side front">
            <div class="img">
                <img src="storage/category/image/{{ $category->image }}"/>
            </div>
            <div class="info">
            <h3>{{ $category->name }}</h3><br>
            @foreach ($category->children as $child)
            <a href="{{ route('blog.category', ['category' => $child->slug]) }}">{{ $child->name }};</a>
            @endforeach
            </div>
        </div>
        </div>
    </div>
    @endforeach
@endif
