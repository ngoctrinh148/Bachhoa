@extends('layouts.admin')

@section('title')
    Orders
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="py-2">Đơn hàng đã hủy
                                     <a href="{{ url('orders') }}" class="btn btn-outline-warning float-right mr-4">Back</a>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Ngày Đặt Hàng</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr class="text-center">
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ number_format($item->total_price) }}</td>
                                            <td>
                                                @switch($item->status)
                                                    @case(0)
                                                        Đang chờ
                                                    @break
                                                    @case(1)
                                                        Đang giao
                                                    @break
                                                    @case(2)
                                                        Đã Hủy
                                                    @break
                                                    @case(3)
                                                    Đã giao
                                                @break
                                                    @default
                                                        Lỗi
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/view-order/' . $item->id) }}"
                                                    class="btn btn-outline-primary">Xem</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
