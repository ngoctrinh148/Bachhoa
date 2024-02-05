@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header ">
            <h4 class="py-2">Product Page
                <a href="{{ url('add-products') }}"><i class="fa-solid fa-plus btn btn-primary float-right mr-4"></i></a>
            </h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Loại Hàng</th>
                        <th>Giá</th>
                        <th>Giảm Giá</th>
                        <th>Số Lượng</th>
                        <th>Hình Ảnh</th>
                        <th>Hàng Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                {{ number_format($item->original_price - $item->original_price * ($item->discount / 100)) }}
                                VND
                            </td>
                            <td>{{ $item->discount }}%</td>
                            <td>{{ $item->qty }}</td>
                            <td>
                                <img src="{{ asset('asset/uploads/products/' . $item->image) }}" class="cate-image"
                                    alt="">
                            </td>
                            <td>
                                <a href="{{ url('edit-products/' . $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                @if ($user->role_as == 2)
                                    <a class="btn btn-danger btn-sm"
                                        onclick="return confirmDelete('{{ url('delete-products/' . $item->id) }}')">Xóa</a>
                                @endif


                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    function confirmDelete(deleteUrl) {
                                        swal({
                                                title: "Are you sure?",
                                                text: "Once deleted, you will not be able to recover this products!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    window.location.href = deleteUrl;
                                                } else {
                                                    swal("Your products is safe!");
                                                }
                                            });
                                    }
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
