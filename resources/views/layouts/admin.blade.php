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
            swal("Added Successfully!!", "You have been added successfully!", "success");
        </script>
    @endif
    @if (session('status-update'))
        <script>
            swal("Updated Successfully!!", "You have been updated successfully!", "success");
        </script>
    @endif
    @if (session('status-delete'))
        <script>
            swal("Delete Successfully!!", "You have been deleted successfully!", "success");
        </script>
    @endif
    @yield('scipts')
</body>

</html>
