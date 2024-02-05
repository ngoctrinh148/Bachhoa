@extends('layouts.front')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('content')
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Chi tiết đơn hàng
                    <a href="{{ url('orders') }}" class="btn btn-outline-warning float-end">Back</a>
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
                            <div class="b">{{ $ordersv->name }}</div>
                            <div class="b" style="padding-left: 1rem">{{ $ordersv->phone }}</div>
                            <div class="b" style="padding-left: 1rem">{{ $ordersv->email }}</div>
                            <div class="" style="padding-left: 3rem">{{ $ordersv->address1 }}</div>
                            <div class="">, {{ $ordersv->ward }}</div>
                            <div class="">, {{ $ordersv->district }}</div>
                            <div class="">, {{ $ordersv->city }}</div>
                        </div>
                        @if ($ordersv->reason)
                            <h6 style="margin-left: 3rem;">Lý do hủy đơn: {{ $ordersv->reason }}</h6>
                        @endif
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
                            <tbody>
                                @foreach ($ordersv->orderitems as $iitem)
                                    <tr class="text-center">
                                        <td>{{ $iitem->products->name }}</td>
                                        <td>{{ $iitem->qty }}</td>
                                        <td>{{ number_format($iitem->price) }}</td>
                                        <td><img src="{{ asset('asset/uploads/products/' . $iitem->products->image) }}"
                                                width="50px" alt=""></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Trạng Thái Đơn Hàng</h5>
                            </div>
                            <div class="col-md-4 ">
                                <form action="{{ url('update-order/' . $ordersv->id) }}" method="POST" class="row">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-8">
                                        <select class="form-select col-md-5" name="order_status">
                                            <option {{ $ordersv->status == '0' ? 'selected' : '' }} value="0">Đang chờ
                                            </option>
                                            <option {{ $ordersv->status == '1' ? 'selected' : '' }} value="1">Xác nhận
                                            </option>
                                            {{-- <option {{ $ordersv->status == '2' ? 'selected' : '' }} value="2">Hủy
                                            </option> --}}
                                            @if ($user->role_as == 2)
                                                <option {{ $ordersv->status == '4' ? 'selected' : '' }} value="4">Xóa
                                            @endif
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <button class="btn btn-outline-primary" type="submit">Cập Nhật</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ url('print-bill/' . $ordersv->id) }}" class="btn btn-outline-success">In hóa
                                    đơn</a>
                                {{-- <button class="btn btn-outline-success" onclick="printPage()">In trang</button> --}}
                            </div>
                            <div class="col-md-3">
                                <h6 class="float-end py-2">Tổng tiền: <span
                                        style="margin-left: 2rem">{{ number_format($ordersv->total_price) }} VND</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function printPage() {
        window.print();
    }
</script>
