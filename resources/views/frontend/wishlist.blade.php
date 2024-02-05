@extends('layouts.front')

@section('title')
    Wishlist
@endsection

@section('content')
    <div class="container ">
        <div class="card shadow product-data " style="margin-top: 8rem">
            <div class="card-body wishlist-item" >
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $citem)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <a
                                    href="{{ url('category/' . $citem->products->category->slug . '/' . $citem->products->slug) }}">
                                    <img src="{{ asset('asset/uploads/products/' . $citem->products->image) }}" height="100px"
                                        width="100px" alt="Image here">
                                </a>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h5>{{ $citem->products->name }}</h5>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6 style="float: inline-end; margin-right: 50px; margin-top: 2px">
                                    @if ($citem->products->discount != '0')
                                        <span
                                            class="float-end">{{ number_format($citem->products->original_price - $citem->products->original_price * ($citem->products->discount / 100)) }}
                                            VND</span>
                                    @else
                                        <span class="float-end ">{{ number_format($citem->products->original_price) }} VND </span>
                                    @endif
                                </h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" value="{{ $citem->prod_id }}" class="prod_id" name="prod_id">
                                @if ($citem->products->qty >= 0)
                                    <input type="hidden" name="quantity " value="1"
                                    class="form-control qty-input text-center">
                                @else
                                    <h6>Mặt hàng đã hết</h6>
                                @endif

                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-primary addToCartBtn"> Thêm vào Giỏ </button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger remove-wishlist-item"> Xóa khỏi Yêu Thích</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <style>
                        .wishlist-item {
                            height: 65vh;
                        }
                    </style>
                    <h4 class="text-center mt-3">Không có sản phẩm yêu thích nào cả</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
