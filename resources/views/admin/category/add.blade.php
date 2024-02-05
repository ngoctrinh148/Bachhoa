@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm Mới Loại Hàng</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Tên loại hàng</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ẩn loại hàng</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phổ biến</label>
                        <input type="checkbox" name="popular">
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
