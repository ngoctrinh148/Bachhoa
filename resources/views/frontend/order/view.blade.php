@extends('layouts.front')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('content')
    <div class="container py-5 ctdonhang">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Chi tiết đơn hàng
                    <a href="{{ url('my-order') }}" class="btn btn-outline-warning float-end">Back</a>
                </h2>
                <div class="card">
                    <div class="card-header ">
                        <div class="diachi">
                            <h4>
                              <span>
                                <i class="fas fa-location-dot fa-flip-horizontal" style="color: #ff0000;"></i>
                              </span>
                              Địa chỉ giao hàng
                            </h4>
                            <hr>
                           
                          </div>
                        <div class="vitri py-2">
                            <div class="b">{{ $orders->name }}</div>
                            <div class="b" style="padding-left: 1rem">{{ $orders->phone }}</div>
                            <div class="b" style="padding-left: 1rem">{{ $orders->email }}</div>
                            <div class="" style="padding-left: 3rem">{{ $orders->address1 }}</div>
                            <div class="">, {{ $orders->ward }}</div>
                            <div class="">, {{ $orders->district }}</div>
                            <div class="">, {{ $orders->city }}</div>
                            <button class="btn btn-outline-primary change-address">Thay đổi</button>
                        </div>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Hình ảnh</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($orders->orderitems as $item)
                                    <tr class="text-center">
                                       <td>{{$item->products->name}}</td>
                                       <td>{{$item->qty}}</td>
                                       <td>{{number_format($item->price)}}</td>
                                       <td ><img src="{{ asset('asset/uploads/products/'.$item->products->image) }}" width="50px" alt=""></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="float-end px-2">Tổng tiền: <span style="margin-left: 3rem">{{ number_format($orders->total_price)}} VND</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
