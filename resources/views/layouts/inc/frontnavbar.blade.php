<nav class="navbar nav-main navbar-expand-lg  navbar-light navbar-transparent navbar-absolute mr-2 shadow">
    <div class="container-fluid">
        <a class="navbar-brand py-3 " style="margin-left: 6rem;" href="{{ url('/') }}">Bách Hóa NT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="search-bar">
            <form action="{{ url('search-product') }}" method="POST">
                @csrf
                <div class="input-group ">
                    <input type="search" class="form-control"  placeholder="Mua gì tìm ngayyyy" id="inputFind"
                        name="product_name" aria-describedby="basic">
                    <button type="submit" class=" input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto ">
                <li>
                    <a class="nav-link my-cart" href="{{ url('cart') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="badge badge-pill bg-primary cart-count">0</span>
                    </a>
                </li>
                <li class="menuButton" onclick=showSidebar()><a href="#"><i class="fa-solid fa-bars"></i></a></li>
            </ul>

        </div>
    </div>
</nav>
<nav>
    <ul class="sidebar" style="list-style: none">
        <li onclick=hideSidebar()><a href="#"><i class="fa-solid fa-x"></i></a></li>
        @if (Auth::user())
            Chào, {{ Auth::user()->name }}
        @endif
        <li><a class="dropdown-item" href="{{ url('my-order') }}">Đơn Hàng Của Tôi</a></li>
        <li><a href="{{ url('category') }}">Danh Mục</a></li>
        <li>
            <a class=" my-wishlist "href="{{ url('wishlist') }}">
                Danh Sách Yêu Thích
                <span class="badge badge-pill bg-success wishlist-count">0</span>
            </a>
        </li>
        <li><a href="#">Cài Đặt</a></li>
        @guest
            @if (Route::has('login'))
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a></li>
            @endif
        @else
            @if (Auth::user()->role_as == '1' || Auth::user()->role_as == '2')
                <li><a class="dropdown-item" href="{{ '/dashboard' }}">Trang Admin</a></li>
            @endif

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Đăng Xuất') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>
<div class="navcate" onmouseenter="showSidebarcate()" onmouseleave="hideSidebarcate()">
    <div class="danhmuc py-2">
        <h5>Danh mục sản phẩm</h5>
    </div>
    <div class="sidebarcate te " id="navside" style="display: none">
        <ul class="cate " id = "cateside">

            {{-- @foreach ($cate as $cate)
                <li class="licate">
                    <a href="{{ url('view-category/' . $cate->slug) }}">{{ $cate->name }}
                    </a>
                    @if ($cate->popular == '1')
                        <label class="lable_name badge bg-danger trending-tag popular-tag"
                            style="display: flex">Hot</label>
                    @endif
                </li>
            @endforeach --}}
        </ul>
    </div>
</div>
