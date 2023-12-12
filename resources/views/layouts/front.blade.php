<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

</head>

<body>
    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status-add'))
        <script>
            swal("Added Successfully!!", "You have been added successfully!", "success");
        </script>
    @endif
    @if (session('status-order'))
        <script>
            swal("Bạn đã đặt hàng thành công!!", "Đơn hàng của bạn sẽ sớm được giao!", "success");
        </script>
    @endif
    @if (session('status-update'))
        <script>
            swal("Updated Successfully!!", "You have been updated successfully!", "success");
        </script>
    @endif
    @if (session('status-warning-login'))
        <script>
            swal({
                title: "Bạn chưa đăng nhập?",
                text: "Bạn cần đăng nhập để tiếp tục thao tác ",
                icon: "warning",
                buttons: {
                    cancel: "Hủy",
                    login: {
                        text: "Đăng nhập",
                        value_login: "login",
                    },
                },
            }).then((value_login) => {
                if (value_login === "login") {
                    window.location.href = "/login";
                }
            })
        </script>
    @endif
    @yield('scripts')
</body>
</html>
