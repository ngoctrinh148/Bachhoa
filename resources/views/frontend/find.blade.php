@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h4>Tìm kiếm với từ khóa "{{ $search_product }}"</h4>
                @if ($products->count() != 0)
                    @foreach ($products as $prod)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                                    <img src="{{ asset('asset/uploads/products/' . $prod->image) }}" class="image-products"
                                        alt="Products image">
                                    <div class="card-body">
                                        <h4>{{ $prod->name }}</h4>
                                        @if ($prod->trending == '1')
                                            <span class="float-start "><s>{{ $prod->original_price }} VND </s></span>
                                            <span class="float-end">{{ $prod->selling_price }} VND</span>
                                        @else
                                            <span class="float-end ">{{ $prod->original_price }} VND </span>
                                        @endif

                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="search-noting">Không có sản phẩm phù hợp với từ khóa!</h4>
                @endif

            </div>
        </div>
    </div>
@endsection
