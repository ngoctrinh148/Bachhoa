<div class="sidebarcate">
    @foreach ($SESSION['cate'] as $cate)
        <ul>
            <li><a href="{{ url('view-category/' . $cate->slug) }}">{{ $cate->name }}</a></li>
        </ul>
    @endforeach
</div>
