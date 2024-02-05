@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chỉnh Sửa Mặt Hàng</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-products/' . $products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên mặt hàng</label>
                        <input type="text" class="form-control" value="{{ $products->name }}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-select" name="cate_id">
                            <option value="{{ $products->cate_id }}">{{ $products->category->name }}</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $products->slug }}" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" value="{{ $products->qty }}" name="qty">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="description" rows="3" class="form-control">{{ $products->description }} </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Giá</label>
                        <input type="number" class="form-control" value="{{ $products->original_price }}"
                            name="original_price">
                    </div>

                    <div class="col-md-6 mb-3 mt-4">
                        <label for="">Khuyến mãi</label>
                        <input type="number" name="discount" value="{{ $products->discount }}"><span> %</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ẩn sản phẩm</label>
                        <input type="checkbox" name="status" {{ $products->status == '1' ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Xu hướng</label>
                        <input type="checkbox" name="trending" {{ $products->trending == '1' ? 'checked' : '' }}>
                    </div>

                    @if ($products->image)
                        <img src="{{ asset('asset/uploads/products/' . $products->image) }}" class="w-50"
                            alt="Products image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
