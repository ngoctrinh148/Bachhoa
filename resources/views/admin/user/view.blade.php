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
                                <label for="">Name</label>
                                <div class="p-2 border">{{ $users->name == ''? 'Null':$users->name }}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $users->role_as == '0'? 'Người Dùng':'Admin'}}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <div class="p-2 border">{{ $users->email == ''? 'Null':$users->email }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone</label>
                                <div class="p-2 border">{{ $users->phone == ''? 'Null':$users->phone }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <div class="p-2 border">{{ $users->address1 == ''? 'Null':$users->address1 }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <div class="p-2 border">{{ $users->address2 == ''? 'Null':$users->address2 }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Ward</label>
                                <div class="p-2 border">{{ $users->ward == ''? 'Null':$users->ward  }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">District</label>
                                <div class="p-2 border">{{ $users->district == ''? 'Null':$users->district }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <div class="p-2 border">{{ $users->city == ''? 'Null':$users->city }}</div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <div class="p-2 border">{{ $users->pincode == ''? 'Null':$users->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
