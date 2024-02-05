@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')

    <div class="py-5 pt-5">
        <div class="container indexcate">
            <div class="row">
                <div class="col-md-12">
                    <h2>Tất cả danh mục</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-4 mb-3">
                                <a href="{{ url('view-category/' . $cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('asset/uploads/category/' . $cate->image) }}" alt="Category image">
                                        <div class="card-body">
                                            <h4>{{ $cate->name }}</h4>
                                            <p>
                                                {{ $cate->description }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
