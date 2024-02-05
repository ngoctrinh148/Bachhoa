<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $order = Orders::where('user_id', auth()->id())->get();
        $cate = Category::where('status', '0')->get();
        return view("frontend.order.index", compact("order", 'cate'));
    }
    public function view($id){
        $orders = Orders::where('user_id', Auth::id())->where('id', $id)->first();
        $cate = Category::where('status', '0')->get();
        return view('frontend.order.view', compact('orders', 'cate'));
    }
    public function addreason(Request $request){
        
        $id = $request->input('order_id');
        $orders = Orders::where('user_id', Auth::id())->where('id', $id)->first();
        $orders->reason = $request->input('reason');
        $orders->status = '2';
        $orders->update();
        $cate = Category::where('status', '0')->get();
        return redirect('my-order')->with('status-cancel', 'Đơn hàng của bạn đã được hủy');
    }
    public function delete($id){
        $order_delete = Orders::where('user_id', Auth::id())->where('id', $id)->first();
        $order_delete->delete();
        return redirect('my-order')->with('status-delete', 'Đơn hàng của bạn đã được xóa');
    }
    public function cancel($id){
        $orders_success = Orders::where('user_id', Auth::id())->where('id', $id)->first();
        $orders_success->status = '2';
        $orders_success->save();
        return redirect('my-order')->with('status-cancel', 'Bạn đã hủy đơn hàng');
    }
    public function success($id){
        $orders_success = Orders::where('user_id', Auth::id())->where('id', $id)->first();
        $orders_success->status = '3';
        $orders_success->save();
        return redirect('my-order')->with('status-success', 'Bạn đã nhận được hàng');
    }
}
