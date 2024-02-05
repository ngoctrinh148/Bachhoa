@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container find">
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
                                        @if ($prod->discount != '0')
                                            <span class="float-start "><s>{{ number_format($prod->original_price) }} VND
                                                </s></span>
                                            <span
                                                class="float-end">{{ number_format($prod->original_price - $prod->original_price * ($prod->discount / 100)) }}
                                                VND</span>
                                        @else
                                            <span class="float-end ">{{ number_format($prod->original_price) }} VND </span>
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
