<nav class="navbar navbar-expand-lg  navbar-light bg-light navbar-transparent navbar-absolute mr-2 shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Bách Hóa NT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="search-bar">
            <form action="{{ url('search-product') }}" method="POST">
                @csrf
                <div class="input-group ">
                    <input type="search" class="form-control" required placeholder="Mua gì tìm ngayyyy"
                        id="inputFind" name="product_name" aria-describedby="basic">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto ">
                <li>
                    <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ url('category') }}">Danh
                        Mục</a>
                </li>
                <li>
                    <a class="nav-link my-cart {{ Request::is('cart') ? 'active' : '' }}" href="{{ url('cart') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="badge badge-pill bg-primary cart-count">0</span>
                    </a>
                </li>
                <li>
                    <a
                        class="nav-link my-wishlist {{ Request::is('wishlist') ? 'active' : '' }}"href="{{ url('wishlist') }}">
                        <i class="fa fa-regular fa-heart"></i>
                        <span class="badge badge-pill bg-success wishlist-count">0</span>
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" name="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownProfile">
                            @if (Auth::user()->role_as == '1')
                                <a class="dropdown-item" href="{{ '/dashboard' }}">Trang Admin</a>
                            @endif
                            <a class="dropdown-item" href="#">Thông Tin</a>
                            <a class="dropdown-item" href="{{ url('my-order') }}">Đơn Hàng Của Tôi</a>
                            <a class="dropdown-item" href="#">Cài Đặt</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Đăng Xuất') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
