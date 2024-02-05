@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="py-2">Chi tiết tài khoản
                                    <a href="{{ url('users') }}" class="btn btn-outline-warning float-right mr-4">Back</a>
                                </h4>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Tên tài khoản</label>
                                <div class="p-2 border">{{ $users->name == '' ? 'Null' : $users->name }}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phân quyền</label>
                                @if ($users->role_as == 2)
                                    
                                @else
                                <form action="{{ url('update-role/' . $users->id) }}" method="post">
                                    @csrf
                                    <div class="role row">
                                        <div class="role_user col-md-4 py-2">
                                          <input type="radio" name="role_as" value="0" {{ $users->role_as == '0' ? 'checked' : '' }}>
                                          <label for="role_user">Người Dùng</label>
                                        </div>
                                        <div class="role_admin col-md-3 py-2">
                                          <input type="radio" name="role_as" value="1" {{ $users->role_as == '1' ? 'checked' : '' }}>
                                          <label for="role_admin">Admin</label>
                                        </div>
                                        <button class="btn btn-outline-secondary py-2">Phân Quyền</button>
                                      </div>
                                </form>
                                @endif
                             

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <div class="p-2 border">{{ $users->email == '' ? 'Null' : $users->email }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Số điện thoại</label>
                                <div class="p-2 border">{{ $users->phone == '' ? 'Null' : $users->phone }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Địa chỉ 1</label>
                                <div class="p-2 border">{{ $users->address1 == '' ? 'Null' : $users->address1 }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Địa chỉ 2</label>
                                <div class="p-2 border">{{ $users->address2 == '' ? 'Null' : $users->address2 }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Xã/Phường</label>
                                <div class="p-2 border">{{ $users->ward == '' ? 'Null' : $users->ward }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Quận/Huyện</label>
                                <div class="p-2 border">{{ $users->district == '' ? 'Null' : $users->district }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Tỉnh/Thành Phố</label>
                                <div class="p-2 border">{{ $users->city == '' ? 'Null' : $users->city }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Mã Pin</label>
                                <div class="p-2 border">{{ $users->pincode == '' ? 'Null' : $users->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
