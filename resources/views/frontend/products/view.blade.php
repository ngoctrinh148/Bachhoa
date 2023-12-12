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
                <form id="rating-form" action="{{ url('/add-rating') }}" class="rating-css" method="POST">
                    <div class="star-icon">
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
                            <input type="hidden" value="5" name="product_rating">
                        @endif
                    </div>
                </form>

                <div id="review-form" style="display: none;">
                    <form action="{{ url('add-review') }}" method="post" style="width: 40vw">
                        @csrf
                        <div class="f-input row py-3" style="padding: 2rem">
                            <input type="hidden" name="product_id" value="{{ $products->id }}">

                            <input type="text" class="form-control form-review" name="userreview"
                                placeholder="Để lại đánh giá về sản phẩm">
                            <label>
                                <input type="checkbox" name="suggestion" class="checkbox-suggestion">
                                Bạn sẽ giới thiệu với bạn bè chứ?
                            </label>

                            <div class="lb_image">
                                <label for="">Chọn ảnh đánh giá</label>
                                <input type="file" class="form-control input-image-review" name="image">
                            </div>

                            <button type="submit" class="btn btn-outline-success btn-danhgia ">Đánh
                                giá</button>
                        </div>
                    </form>
                </div>

                <script>
                    const ratingForm = document.getElementById('rating-form');
                    const reviewForm = document.getElementById('review-form');
                    const ratingInputs = ratingForm.querySelectorAll('input[name="product_rating"]');
                    const productRatingInput = document.querySelector('input[name="product_rating"]');

                    ratingInputs.forEach(input => {
                        input.addEventListener('change', () => {
                            productRatingInput.value = input.value;
                            ratingForm.style.display = 'none';
                            reviewForm.style.display = 'block';
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <div class="py-3 md-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
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
                    <div class="col-md-8">
                        <h1 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label class="lable_name float-end badge bg-danger trending-tag">Trending</label>
                            @endif
                        </h1>
                        <hr>
                        @if ($products->trending == '1')
                            <label class="me-3">Original Price : <s>{{ $products->original_price }} VND</s></label>
                            <label class="fw-bold ">Selling Price : {{ $products->selling_price }} VND</label>
                        @else
                            <label class="me-3">Original Price : {{ $products->original_price }} VND</></label>
                        @endif
                        @php
                            $ratenum = floor($rating_value);
                            $hasDecimal = $rating_value - $ratenum > 0;
                        @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @if ($hasDecimal)
                                <i class="fa fa-star-half checked"></i>
                                <i class="fa fa-star-half fa-flip-horizontal" style="margin-left: -.33rem"></i>
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
                                <span>{{ $ratings->count() }} Ratings</span>
                            @else
                                Không có đánh giá
                            @endif
                        </div>

                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Số Lượng</label>
                                <div class="input-group text-center mb-3" style="width: 120px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1"
                                        class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br />
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">
                                        Add to Card</button>
                                @endif
                                @if ($products->wishlist)
                                    <a href="{{ url('wishlist') }}"><i class="fa fa-regular fa-heart"
                                            style="color: green; font-size:2rem"></i></a>
                                @else
                                    <button type="button" class="btn btn-success me-3 addToWishlish float-start">Add to
                                        Wishlist
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Thông tin sản phẩm</h3>
                    <p class="col-md-12 mt-3">
                        {!! $products->description !!}
                    </p>
                    <hr>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Đánh giá sản phẩm
                    </button>

                    <div class="review-view-comment" col>
                        @foreach ($review as $ritem)
                            <div class="user-review">
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
                                    <button onclick="toggleDropdown()" class="dropdown-button"><i
                                            class="fa fa-solid fa-ellipsis"></i></button>
                                    <div id="dropdown-content" class="dropdown-content">
                                        @if ($ritem->user_id == Auth::id())
                                            <a href="{{ url('edit-comment/' . $products->slug . '/' . $ritem->id) }}"
                                                class="pl-3">Edit</a>
                                            <a href="#">Lựa chọn 2</a>
                                            <a href="{{ url('delete-review/' . $ritem->id) }}">Xóa đánh giá</a>
                                        @else
                                            <a href="#">Lựa chọn 1</a>
                                            <a href="#">Lựa chọn 2</a>
                                        @endif
                                    </div>
                                </div>
                                @if ($ritem->suggestion)
                                    <small style="color: forestgreen">Sẽ giới thiệu sản phẩm</small>
                                @endif
                                <p class="py-2">
                                    {{ $ritem->user_review }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
