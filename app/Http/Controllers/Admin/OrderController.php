<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Orders::where('status', '0')->get();
        return view("admin.order.index", compact("orders"));
    }
    public function view($id){
        $ordersv = Orders::where('id', $id)->first();
        $user = User::where('id', Auth::id())->first();
        return view('admin.order.view', compact('ordersv','user'));
    }
    public function updateorder (Request $request, $id){
        $orders = Orders::find($id);

        if ($request->input('order_status') == 4) {
            $orders->delete();
            return redirect('orders')->with('status-update', 'Đã xóa đơn hàng');
        }else{
            $orders->status = $request->input('order_status');
            if($orders->status != 2){
                $orders->reason = NULL;
            }
            $orders->update();
            return redirect('orders')->with('status-update', 'Đã cập nhật trạng thái');
        }
    }
    public function orderdelivering() {
        $orders = Orders::where('status', '1')->get();
        return view("admin.order.delivering", compact("orders"));
    }
    public function ordercanceled() {
        $orders = Orders::where('status', '2')->get();
        return view("admin.order.canceled", compact("orders"));
    }
    public function orderdelivered() {
        $orders = Orders::where('status', '3')->get();
        return view("admin.order.delivered", compact("orders"));
    }
}
