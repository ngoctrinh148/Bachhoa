@extends('layouts.front')

@section('title')
    My Order
@endsection

@section('content')
    <div class="container py-5 my-order">
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
                                                        Đã hủy
                                                    @break

                                                    @case(3)
                                                        Đã giao
                                                    @break

                                                    @default
                                                        Lỗi
                                                @endswitch
                                            </td>
                                            <td class="">
                                                <a href="{{ url('view-order/' . $item->id) }}"
                                                    class="btn btn-outline-primary">Xem</a>
                                                @if ($item->status == 0)
                                                    {{-- <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        style="width:4rem">Hủy</button> --}}
                                                      <a href="{{ url('cancel-order/' . $item->id) }}" class="btn btn-outline-warning" style="width:4rem">Hủy</a>
                                                @else
                                                    <button class="btn " style="width:4rem" disabled>Hủy</button>
                                                @endif
                                                @if ($item->status == 1 || $item->status == 0)
                                                @php $id = $item->id @endphp    
                                                    <button class="btn btn-outline-danger" style="width:4rem"
                                                        disabled>Xóa</button>
                                                @else
                                                    <a href="{{ url('delete-order/' . $item->id) }}"
                                                        class="btn btn-outline-danger" style="width:4rem">Xóa</a>
                                                @endif
                                                @if ($item->status == 1)
                                                    <a href="{{ url('success-order/' . $item->id) }}"
                                                        class="btn btn-outline-success">Đã nhận</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <input type="hidden" name="order_id" value="@php $id @endphp">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Lý do hủy đơn
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div id="review-form">
                                <form action="{{ url('add-reason/') }}" method="post" style="width: 40vw">
                                    @csrf
                                    <div class="f-input row py-3" style="padding: 2rem">
                                        <input type="hidden" name="order_id" value="@php $id @endphp">

                                        <input type="text" class="form-control form-review" id="reasoninput"
                                            name="reason" placeholder="Để lại lý do hủy sản phẩm">
                                        <input type="hidden" name="userid" value="{{ Auth::id() }}">
                                        <button type="submit" class="w50 btn btn-outline-success btn-danhgia ">Xác
                                            nhận</button>
                                    </div>
                                </form>
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
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var orderId = button.data('order-id');

            // Đặt động ID trong trường đầu vào của modal
            $('#order_id_input').val(orderId);
            $('#order_id_form').val(orderId);
        });
    </script>
@endsection

