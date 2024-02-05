<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">

<body onLoad="window.print()">
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Hóa Đơn Bán Hàng
                    <a href="{{ url('orders') }}" class="back btn btn-outline-warning float-end">Back</a>
                </h2>
                <div class="card">
                    <div class="card-header ">
                        <div class="diachi">
                          <h5>Bách Hóa NT</h5>
                            <hr>
                        </div>
                        <div class="vitri-in py-2">
                            <p>Tên khách hàng: {{ $ordersv->name }}</p>
                            <p>Số điện thoại: {{ $ordersv->phone }}</p>
                            <p>Email: {{ $ordersv->email }}</p>
                            <p>Địa chỉ: {{ $ordersv->address1 }}, {{ $ordersv->ward }}, {{ $ordersv->district }},
                                {{ $ordersv->city }}</p>
                            <p>Phương Thức: Nhận tiền khi giao</p>
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
                            <tbody>
                                @foreach ($ordersv->orderitems as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td><img src="{{ asset('asset/uploads/products/' . $item->products->image) }}"
                                                width="50px" alt=""></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
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
</body>
