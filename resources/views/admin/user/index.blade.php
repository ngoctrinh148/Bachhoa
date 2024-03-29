@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Quản lý tài khoản</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a href="{{ url('view-user/' . $item->id) }}" class="btn btn-warning btn-sm">Xem</a>
                                @if ($user->role_as == 2)
                                    <a class="btn btn-danger btn-sm" href="{{ url('delete-user/' . $item->id) }}">Xóa</a>
                                @endif


                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    function confirmDelete(deleteUrl) {
                                        swal({
                                                title: "Are you sure?",
                                                text: "Người ",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    window.location.href = deleteUrl;
                                                } else {
                                                    swal("This account is safe!");
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
