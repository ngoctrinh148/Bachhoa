@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h5>Viết bình luận về {{ $product->name }}</h5>
                            <form action="{{  }}" method="POST">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <textarea name="user_review" class="form-control" rows="5" placeholder="Để lại đánh giá của bạn..."></textarea>
                                <button type="submit" class="btn btn-outline-primary">Đánh giá</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>You are not eligible to review this product</h5>
                                <p>
                                    For the trusthworthiness of the reviews
                                </p>
                            </div>
                           
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection