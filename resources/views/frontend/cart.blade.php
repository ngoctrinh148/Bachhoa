@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow product-data ">
            <div class="card-body cart-item">
                @php
                    $total = 0;
                @endphp
                @if (count($cartItems) > 0)
                    @foreach ($cartItems as $citem)
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
                            <div class="col-md-3 my-auto">
                                <h6 style="float: inline-end; margin-right: 50px; margin-top: 2px">
                                    {{ $citem->products->selling_price }} VND</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" value="{{ $citem->prod_id }}" class="prod_id" name="prod_id">
                                @if ($citem->products->qty > $citem->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3 " style="width: 130px;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity " value="{{ $citem->prod_qty }}"
                                            class="form-control qty-input text-center">
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    @php
                                        $total += $citem->products->selling_price * $citem->prod_qty;
                                    @endphp
                                @else
                                    <h6>Mặt hàng đã hết</h6>
                                @endif

                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remote</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <style>
                        .cart-item {
                            height: 65vh;
                        }
                    </style>
                    <div class="text-center d-flex justify-content-center">
                        <h2>Không có sản phẩm trong giỏ hàng <i class="fa fa-shopping-cart"></i></h2>
                    </div>
                @endif

            </div>
            <div class="card-footer">
                <h6>Tổng tiền: {{ $total }} VND
                    <a href="{{ url('checkout') }}">
                        <button class="btn btn-outline-success float-end">Process to Checkout</button>
                    </a>
                </h6>
            </div>
        </div>
    </div>
@endsection
