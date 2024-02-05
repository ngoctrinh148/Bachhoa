@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm Mới Mặt Hàng</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên mặt hàng</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-select" name="cate_id" required>
                            <option value="">Chọn loại hàng</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" name="qty" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="description" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Giá</label>
                        <input type="number" class="form-control" name="original_price" required>
                    </div>

                    <div class="col-md-6 mb-3 mt-4">
                        <label for="">Khuyến mãi</label>
                        <input type="number" name="discount" value="0"><span> %</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ẩn sản phẩm</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Xu hướng</label>
                        <input type="checkbox" name="trending">
                    </div>
                   
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
