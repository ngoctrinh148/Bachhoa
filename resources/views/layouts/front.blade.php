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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">


    <style>
        a {
            text-decoration: none !important;
            color: black !important;
        }
    </style>
</head>

<body>
    <div class="headernav">
        @include('layouts.inc.frontnavbar')
    </div>

    <div class="content ">
        @yield('content')
    </div>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                starAutoComplete(response);
            }
        });

        function starAutoComplete(availableTags) {
            $("#inputFind").autocomplete({
                source: function(request, response) {
                    var term = removeDiacritics(request.term.toLowerCase());
                    var filteredTags = $.grep(availableTags, function(tag) {
                        return removeDiacritics(tag.toLowerCase()).indexOf(term) === 0;
                    });
                    response(filteredTags);
                }
            });
        }

        function removeDiacritics(str) {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        }
    </script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status-add'))
        <script>
            swal("Thêm thành công", "Sản phẩm đã được thêm vào giỏ!", "success");
        </script>
    @endif
    @if (session('status-order'))
        <script>
            swal("Bạn đã đặt hàng thành công!!", "Đơn hàng của bạn sẽ sớm được giao!", "success");
        </script>
    @endif
    @if (session('status-success'))
        <script>
            swal("Bạn đã nhận hàng thành công!!", "Vui lòng đánh giá sản phẩm!", "success");
        </script>
    @endif
    @if (session('status-delete-review'))
        <script>
            swal("Bạn đã xóa thành công!!", "Đánh giá của bạn đã được xóa", "success");
        </script>
    @endif
    @if (session('status-cancel'))
        <script>
            swal("Hủy thành công", "Đơn hàng của bạn đã được hủy!", "success");
        </script>
    @endif
    @if (session('status-delete'))
        <script>
            swal("Xóa thành công", "Đơn hàng của bạn đã được xóa!", "success");
        </script>
    @endif
    @if (session('status-search-warning'))
        <script>
            swal({
                ti
                text: "Không có sản phẩm nào cả",
                tle: "Cảnh báo!",
                icon: "warning",
                button: "OK",
            });
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
