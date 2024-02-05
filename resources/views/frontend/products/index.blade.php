@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-5">
        <div class="container indexprod">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                                <img src="{{ asset('asset/uploads/products/' . $prod->image) }}" class="image-products"
                                    alt="Products image">
                                @if ($prod->discount != '0')
                                    <label class="lable_name badge bg-danger discount-tag"
                                        style="display: flex; padding-top: -5rem">-{{ $prod->discount }}%</label>
                                @endif
                                <div class="card-body">
                                    <h4>{{ $prod->name }}</h4>
                                    @if ($prod->discount != '0')
                                        <span class="float-start "><s>{{ number_format($prod->original_price) }} VND </s></span>
                                        <span
                                            class="float-end">{{ number_format($prod->original_price - $prod->original_price * ($prod->discount / 100)) }}
                                            VND</span>
                                    @else
                                        <span class="float-end ">{{ number_format($prod->original_price) }} VND </span>
                                    @endif

                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
