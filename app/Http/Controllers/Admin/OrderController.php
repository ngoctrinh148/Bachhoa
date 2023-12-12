<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Orders::where('status', '0')->get();
        return view("admin.order.index", compact("orders"));
    }
    public function view($id){
        $orders = Orders::where('id', $id)->first();
        return view('admin.order.view', compact('orders'));
    }
    public function updateorder (Request $request, $id){
        $orders = Orders::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status-update','Đã cập nhật trạng thái');
    }
    public function orderdelivering() {
        $orders = Orders::where('status', '1')->get();
        return view("admin.order.delivering", compact("orders"));
    }
    public function orderdelivered() {
        $orders = Orders::where('status', '2')->get();
        return view("admin.order.delivered", compact("orders"));
    }
}
