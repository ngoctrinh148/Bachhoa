@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chỉnh sửa loại hàng</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên mặt hàng</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ẩn sản phẩm</label>
                        <input type="checkbox" {{ $category->status == '1' ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phổ biến</label>
                        <input type="checkbox" {{ $category->popular == '1' ? 'checked' : '' }} name="popular">
                    </div>
                    @if ($category->image)
                        <img src="{{ asset('asset/uploads/category/' . $category->image) }}" class="w-50"
                            alt="Category image" >
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <div class="col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
