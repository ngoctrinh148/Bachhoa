@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="py-2">Trang Loại Hàng
                <a href="{{ url('add-category') }}"><i class="fa-solid fa-plus btn btn-primary float-right mr-4"></i></a>
            </h4>

            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Mặt Hàng</th>
                        <th>Hình Ảnh</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="{{ asset('asset/uploads/category/' . $item->image) }}" class="cate-image"
                                    alt="">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/' . $item->id) }}" class="btn btn-warning">Sửa</a>
                                @if ($user->role_as == 2)
                                    <a class="btn btn-danger" href="{{ url('delete-category/' . $item->id) }})">Xóa</a>
                                @endif
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
