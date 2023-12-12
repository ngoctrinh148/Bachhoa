@extends('layouts.front')
@section('title')
    Bách Hóa Ngọc Trịnh
@endsection

@section('content')
    <div class="pt-5">
        @include('layouts.inc.slider')
    </div>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Sản phẩm đặc sắc</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($feature_products as $prod)
                        <div class="item">
                            <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('asset/uploads/products/' . $prod->image) }}" alt="Products image">
                                    <div class="card-body">
                                        <h4>{{ $prod->name }}</h4>
                                        <span class="float-start "><s>{{ $prod->original_price }} ₫</s></span>
                                        <span class="float-end product-sale" >{{ $prod->selling_price }} ₫</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Danh mục thịnh hành</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_categories as $tcate)
                        <div class="item">
                            <a href="{{ url('view-category/' . $tcate->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('asset/uploads/category/' . $tcate->image) }}" alt="Category image">
                                    <div class="card-body">
                                        <h4>{{ $tcate->name }}</h4>
                                        {{-- <p>
                                            {{ $tcate->description }}
                                        </p> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
