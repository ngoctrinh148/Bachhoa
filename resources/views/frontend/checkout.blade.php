@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mt-3">
                                    <label for="">Name</label>
                                    <input type="" class="form-control name" required name="name"
                                        value="{{ $user->name }}" >
                                    <span id="name_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control phone" required
                                        value="{{ $user->phone }}">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" name="address1" class="form-control address1" required
                                        value="{{ $user->address1 }}">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Ward</label>
                                    <input type="text" name="ward" class="form-control ward" required
                                        value="{{ $user->ward }}">
                                    <span id="ward_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">District</label>
                                    <input type="text" name="district" class="form-control district" required
                                        value="{{ $user->district }}">
                                    <span id="district_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control city" required
                                        value="{{ $user->city }}">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <input type="hidden" class="form-control email" required name="email"
                                        value="{{ $user->email }}">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            Order Details
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Tên sản phẩm</td>
                                        <td>Số Lượng</td>
                                        <td>Giá</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $citem)
                                        <tr>
                                            <td>{{ $citem->products->name }}</td>
                                            <td>{{ $citem->prod_qty }}</td>
                                            @if ($citem->products->discount != '0')
                                                <td>{{ number_format($citem->products->original_price - $citem->products->original_price * ($citem->products->discount / 100)) }}
                                                    VND</td>
                                            @else
                                                <td>{{ number_format($citem->products->original_price) }} VND </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="col-md-12 btn btn-outline-primary">Place order | COD</button>
                            <button type="button" disabled class="btn btn-outline-warning w-100 mt-3 paycredit_btn">Pay with
                                credit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
