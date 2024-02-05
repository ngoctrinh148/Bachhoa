<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('admin/css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">


</head>

<body class="font-sans antialiased">
    <div class="wrapper">
        @include('layouts.inc.sidebar')
        <div class="main-panel">
            @include('layouts.inc.adminnav')
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.inc.adminnav')
            @include('layouts.inc.adminfooter')
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status-add'))
        <script>
            swal("Thêm mới thành công!!", "Bạn đã thêm mới thành công!", "success");
        </script>
    @endif
    @if (session('status-update'))
        <script>
            swal("Cập nhật thành công!!", "Bạn đã cập nhật thành công!", "success");
        </script>
    @endif
    @if (session('status-update-role'))
        <script>
            swal("Cập nhật thành công!!", "Bạn đã cập nhật vai trò thành công", "success");
        </script>
    @endif
    @if (session('status-warning-role'))
        <script>
            swal("Cảnh báo!!", "Bạn không đủ phân quyền để dùng tác vụ này!!", "warning");
        </script>
    @endif
    @if (session('status-details-delete'))
        <script>
            swal("Xóa thành công", "Đơn hàng đã được xóa!", "success");
        </script>
    @endif
    @if (session('status-delete'))
        <script>
            swal("Xoá Thành công!!", "Bạn đã xóa thành công!", "success");
        </script>
    @endif
    @if (session('status-warning-delete'))
        <script>
            swal({
                title: "Cảnh báo?",
                text: "Loại hàng có chứa mặt hàng đang bán",
                icon: "warning",
                buttons: {
                    cancel: "Hủy",
                    delete_product: {
                        text: "Xóa mặt hàng",
                        value: "delete_product",
                    },
                },
            }).then((value) => {
                if (value === "delete_product") {
                    window.location.href = "/products";
                }
            });
        </script>
    @endif
    @yield('scipts')
</body>

</html>
