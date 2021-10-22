@if ($items->where('category_id', $parent)->count())
    @php $level++ @endphp
    @foreach ($items->where('category_id', $parent) as $item)
        <tr>
            <td>
                @if ($level)
                    {{ str_repeat('—', $level) }}
                @endif
                @if($level)
                    <span>{{ $item->name }}</span>
                @else
                    <strong>{{ $item->name }}</strong>
                @endif
            </td>
            <td>{{ iconv_strlen($item->desc) }}</td>
            <td>{{ iconv_strlen($item->seo_keyword) }}</td>
            <td>{{ iconv_strlen($item->seo_title) }}</td>
            <td>
                
                    <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                
            </td>
            <td>
                
                    <form action="{{ route('admin.category.destroy', ['category' => $item->id]) }}"
                          method="post" onsubmit="return confirm('Удалить эту категорию?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <i class="far fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                
            </td>
        </tr>
        @include('admin.part.all-ctgs', ['level' => $level, 'parent' => $item->id])
    @endforeach
@endif