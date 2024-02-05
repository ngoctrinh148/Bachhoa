@extends('layouts.admin')

@section('title')
    Details
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="py-2">Danh sách hóa đơn</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Ngày nhập hàng</th>
                                        <th>Tên mặt hàng</th>
                                        <th>Số lượng</th>
                                        <th>Người nhập</th>
                                        @if ($user->role_as == 2)
                                            <th>Hành động</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $item)
                                        <tr class="text-center">
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <th>{{ $item->users->name }}</th>
                                            @if ($user->role_as == 2)
                                                <th>
                                                    <div class="col-md-2 my-auto">
                                                        <a href="delete-details/{{$item->id}}" class="btn btn-danger"><i class="fa fa-trash"></i> Remote</a>
                                                    </div>
                                                </th>
                                            @endif
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
