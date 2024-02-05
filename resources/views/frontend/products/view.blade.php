@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <input type="hidden" name="product_id" value="{{ $products->id }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá {{ $products->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="review-form" style="">
                    <form action="{{ url('add-review') }}" method="post" style="width: 40vw">
                        @csrf
                        <div class="star-icon rating-css">
                            @if ($user_rating)
                                @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                    {{-- <i class="fa fa-star checked"></i> --}}
                                    <input type="radio" value="{{ $i }}" name="product_rating" checked
                                        id="rating{{ $i }}">
                                    <label for="rating{{ $i }}" class="fa fa-star"></label>
                                @endfor
                                @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                    <input type="radio" value="{{ $i }}" name="product_rating"
                                        id="rating{{ $i }}">
                                    <label for="rating{{ $i }}" class="fa fa-star"></label>
                                @endfor
                            @else
                                <input type="hidden" value="5" name="product_rating" id="rating5">
                                <input type="radio" value="1" name="product_rating" id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                        <div class="f-input row py-3" style="padding: 2rem">
                            <input type="hidden" name="product_id" value="{{ $products->id }}">

                            <input type="text" class="form-control form-review" id="reviewinput" name="userreview"
                                placeholder="Để lại đánh giá về sản phẩm">
                            <label>
                                <input type="checkbox" name="suggestion" class="checkbox-suggestion">
                                Bạn sẽ giới thiệu với bạn bè chứ?
                            </label>

                            <div class="lb_image">
                                <label for="">Chọn ảnh đánh giá</label>
                                <input type="file" class="form-control input-image-review" name="image">
                            </div>
                            <input type="hidden" name="userid" value="{{ Auth::id() }}">
                            <button type="submit" class="btn btn-outline-success btn-danhgia ">Đánh
                                giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 md-4 shadow-sm bg-warning border-top">
        <div class="container ">
            <h6 class="mb-0" style="margin-left: 18rem">
                <a href="{{ url('category') }}">
                    Danh Mục
                </a> /
                <a href="{{ url('view-category/' . $products->category->slug) }}">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card-shadow shadow p-3 mb-5 mt-5 bg-white rounded product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('asset/uploads/products/' . $products->image) }}" class="w-100"
                            alt="Products image">
                    </div>
                    <div class="col-md-8 indexproduct">
                        <h1 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label class="lable_name float-end badge bg-danger trending-tag">Trending</label>
                            @endif
                        </h1>
                        <hr>
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <div class="price">
                            @if ($products->discount != '0')
                                <span class="float-start origin_price">Giá gốc: <s>{{ number_format($products->original_price) }}
                                        ₫</s></span>
                                <span class="discount_price">Giá ưu đãi:
                                    {{ number_format($products->original_price - $products->original_price * ($products->discount / 100)) }}₫</span>
                                @if ($products->discount != '0')
                                    <label class="lable_name badge bg-danger trending-tag "
                                        style="margin-block: .3rem; margin-left: 2rem;">-{{ $products->discount }}%</label>
                                @endif
                            @else
                                <div class="">
                                    <span class="float-start origin_price">Giá sản phẩm: {{ number_format($products->original_price) }}</span>
                                </div>
                                
                            @endif
                        </div>

                        @php
                            $ratenum = floor($rating_value);
                            $hasDecimal = $rating_value - $ratenum > 0;
                        @endphp
                        <div class="rating mt-4 py-4">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @if ($hasDecimal)
                                <i class="fa fa-star-half checked"></i>
                                <i class="fa fa-star-half fa-flip-horizontal" style="margin-left: -1.33rem"></i>
                            @else
                                @if ($rating_value == '5')
                                @else
                                    <i class="fa fa-star"></i>
                                @endif
                            @endif
                            @for ($j = $ratenum + 2; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            @if ($ratings->count() > 0)
                                <span>{{ $ratings->count() }} đánh giá</span>
                            @else
                                Không có đánh giá
                            @endif
                        </div>
                            <div class="">
                                <p>Sản phẩm còn: {{$products->qty }}</p>
                            </div>
                        <hr>
                        <div class="mt-2">
                            @if ($products->qty > 0)
                                <label class="badge bg-success">Còn hàng</label>
                            @else
                                <label class="badge bg-danger">Hết hàng</label>
                            @endif
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Số Lượng</label>
                                <div class="input-group text-center mb-3" style="width: 120px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="number" name="quantity " value="1"
                                        class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br />
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">
                                        Thêm vào Giỏ Hàng</button>
                                @else
                                <button type="button" disabled class="btn btn-primary me-3 addToCartBtn float-start">
                                    Thêm vào Giỏ Hàng</button>
                                @endif
                                @if ($products->wishlist)
                                    <a href="{{ url('wishlist') }}"><i class="fa fa-regular fa-heart"
                                            style="color: green; font-size:2rem"></i></a>
                                @else
                                    <button type="button" class="btn btn-success me-3 addToWishlish float-start">
                                        Thêm vào Yêu Thích
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Thông tin sản phẩm</h3>
                    <p class="col-md-12 mt-3 mota" >
                        {!! $products->description !!}
                    </p>
                    <hr>

                    @if ($bough == '1')
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Đánh giá sản phẩm
                        </button>
                    @endif

                    <div class="review-view-comment" col>
                        @foreach ($review as $ritem)
                            <div class="user-review py-3">
                                <label for="">{{ $ritem->users->name }}</label>
                                <input type="hidden" name="id_review" value="{{ $ritem->id }}">
                                <br>
                                @if ($ritem->rating)
                                    <div class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @php $user_rated = $ritem->rating->stars_rated @endphp
                                        @for ($i = 1; $i <= $user_rated; $i++)
                                            <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for ($j = $user_rated + 1; $j <= 5; $j++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </div>
                                @endif
                                <small>{{ $ritem->created_at->format('d M Y') }}</small>
                                <div class="dropdown">
                                    <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    @if ($ritem->user_id == Auth::id())
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item edit-btn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" href="#">Chỉnh sửa</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ url('delete-review/' . $products->id . '/' . $ritem->id) }}">Xóa
                                                    đánh giá</a></li>
                                        </ul>
                                    @else
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Ẩn đánh giá</a></li>
                                            <li><a class="dropdown-item" href="#">Báo cáo đánh giá</a></li>
                                        </ul>
                                    @endif

                                </div>
                                @if ($ritem->suggestion)
                                    <p style="color: forestgreen; margin-left: 1rem;"><small>Sẽ giới thiệu sản phẩm</small>
                                    </p>
                                @endif
                                <p class="py-2 user-review comment-content">
                                    {{ $ritem->user_review }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container orther-product">
        <div class="card-shadow shadow p-3 mb-5 mt-5 bg-white">
            <div class="card-body">
                <div class="row">
                    <h3>Sản phẩm tương tự</h3>
                    @foreach ($products_orther as $item_orther)
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
