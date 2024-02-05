<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="#" class="simple-text logo-normal">
            Bách Hóa NT
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">category</i>
                    <p>Quản lý loại hàng</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('products') }}">
                    <i class="material-icons">inventory</i>
                    <p>Quản lý mặt hàng</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Danh sách đơn hàng</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}">
                    <i class="material-icons">person</i>
                    <p>Danh sách người dùng</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('details') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('details') }}">
                    <i class="material-icons">class</i>
                    <p>Hóa đơn nhập</p>
                </a>
            </li>
        </ul>
    </div>
</div>
