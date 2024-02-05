<div class="sidebarcate">
    <ul>
        @foreach ($cate as $cate)
            <li class="licate">
                <a href="{{ url('view-category/' . $cate->slug) }}">{{ $cate->name }}
                </a>
                @if ($cate->popular == '1')
                <label class="lable_name badge bg-danger trending-tag popular-tag"
                    style="display: flex">Hot</label>
            @endif
            </li>
        @endforeach
    </ul>
</div>
