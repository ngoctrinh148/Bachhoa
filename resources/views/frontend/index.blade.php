@extends('layouts.front')
@section('title')
    Bách Hóa Ngọc Trịnh
@endsection

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-3 " id="content-left">
                @include('layouts.inc.sidebarcate')
            </div>
            <div class="col-md-9">
                <div class="slider">
                    @include('layouts.inc.slider')
                </div>
                <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <h2>Sản phẩm đặc sắc</h2>
                            <div class="owl-carousel featured-carousel owl-theme">
                                @foreach ($feature_products as $prod)
                                    <div class="item" style="width: 13rem">
                                        <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                                            <div class="card">
                                                <img src="{{ asset('asset/uploads/products/' . $prod->image) }}"
                                                    alt="Products image">
                                                @if ($prod->discount != '0')
                                                    <label class="lable_name badge bg-danger discount-tag"
                                                        style="display: flex; padding-top: -5rem">-{{ $prod->discount }}%</label>
                                                @endif
                                                <div class="card-body">
                                                    <h4>{{ $prod->name }}</h4>
                                                    @if ($prod->discount != '0')
                                                        <span class="float-start "><s>{{ number_format($prod->original_price) }}
                                                                ₫</s></span>
                                                        <span class="float-end"
                                                            style="color: red">{{ number_format($prod->original_price - $prod->original_price * ($prod->discount / 100)) }}₫</span>
                                                    @else
                                                        <span class="float-end ">{{ number_format($prod->original_price) }}₫</span>
                                                    @endif
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
                                    <div class="item" style="width: 13rem">
                                        <a href="{{ url('view-category/' . $tcate->slug) }}">
                                            <div class="card">
                                                <img src="{{ asset('asset/uploads/category/' . $tcate->image) }}"
                                                    alt="Category image">
                                                <div class="card-body">
                                                    <h5>{{ $tcate->name }}</h5>
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
                <div class="py-5 pt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Tất cả Sản phẩm</h2>
                                <div class="row">
                                    @foreach ($all_products as $aprod)
                                        <div class="col-md-4 mb-3 item">
                                            <a href="{{ url('category/' . $aprod->category->slug . '/' . $aprod->slug) }}">
                                                <div class="card">
                                                    <img src="{{ asset('asset/uploads/products/' . $aprod->image) }}"
                                                        alt="Products image">
                                                    @if ($aprod->discount != '0')
                                                        <label class="lable_name badge bg-danger discount-tag"
                                                            style="display: flex; padding-top: -5rem">-{{ $aprod->discount }}%</label>
                                                    @endif
                                                    <div class="card-body">
                                                        <h4>{{ $aprod->name }}</h4>
                                                        @if ($aprod->discount != '0')
                                                            <span class="float-start "><s>{{ number_format($aprod->original_price) }}
                                                                    ₫</s></span>
                                                            <span class="float-end"
                                                                style="color: red">{{ number_format($aprod->original_price - $aprod->original_price * ($aprod->discount / 100)) }}₫</span>
                                                        @else
                                                            <span class="float-end ">{{ number_format($aprod->original_price) }}₫</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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

        function showSidebarcate() {
            var sidebar = document.getElementById("navside");
            sidebar.style.display = "none";
        }
    </script>
@endsection
