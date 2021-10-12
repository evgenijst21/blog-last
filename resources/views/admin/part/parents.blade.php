@if ($items->where('category_id', $parent)->count())
    @php $level++ @endphp
    @foreach ($items->where('category_id', $parent) as $item)
        <option value="{{ $item->id }}" @if ($item->id == $category_id) selected @endif>
            @if ($level) {!! str_repeat('&nbsp;&nbsp;&nbsp;', $level) !!}  @endif
            {{ $item->name }}
        </option>
        @include('admin.part.parents', ['level' => $level, 'parent' => $item->id])
    @endforeach
@endif