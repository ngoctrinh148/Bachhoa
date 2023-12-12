@extends('layouts.front')

@section('title')
    My Order
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h4>Đơn hàng của tôi</h4>
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
                                    @foreach ($order as $item)
                                        <tr class="text-center">
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>
                                                @switch($item->status)
                                                    @case(0)
                                                        Đang chờ
                                                    @break
                                                    @case(1)
                                                        Đang giao
                                                    @break
                                                    @case(2)
                                                        Đã giao
                                                    @break
                                                    @default
                                                        Lỗi
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{ url('view-order/' . $item->id) }}"
                                                    class="btn btn-outline-primary">View</a>
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
