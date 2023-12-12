@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                                <img src="{{ asset('asset/uploads/products/' . $prod->image) }}" class="image-products"
                                    alt="Products image">
                                <div class="card-body">
                                    <h4>{{ $prod->name }}</h4>
                                    @if ($prod->trending == '1')
                                        <span class="float-start "><s>{{ $prod->original_price }} VND </s></span>
                                        <span class="float-end">{{ $prod->selling_price }} VND</span>
                                    @else
                                        <span class="float-end ">{{ $prod->original_price }} VND </span>
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
