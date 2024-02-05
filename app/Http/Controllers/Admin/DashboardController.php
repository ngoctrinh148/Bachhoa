<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $cartcount = Orders::all()->count();
        $usercount = User::where('role_as', 0)->count();
        $prodcount = Product::where('status', 0)->count();
        $monneysum = Orders::where('status', 3)->sum('total_price');
        $orders = Orders::all();

        return view('admin.index', compact('cartcount', 'usercount','prodcount','monneysum', 'orders'));
    }
    public function users()
    {
        $users = User::all();
        $user = User::where('id', Auth::id())->first();
        return view("admin.user.index", compact("users", 'user'));
    }
    public function viewuser($id)
    {
        $users = User::find($id);
        return view("admin.user.view", compact("users"));
    }
    public function deleteuser($id)
    {
        $users = User::where('id', $id)->first();
        $check = Orders::where('user_id', $users->id)->first();
        if($check){
        }else{
            $users->delete();
            return redirect('users')->with('status-delete', 'Tài khoản đã được xóa');
        }
    }
    public function updaterole(Request $request, $id)
    {
        $superadmin = User::where('id', Auth::id())->where('role_as', 2)->first();
        if ($superadmin) {
            $user = User::where('id', $id)->first();
            $user->role_as = $request->input('role_as') == TRUE ? '1' : '0';
            $user->update();
            return redirect()->back()->with('status-update-role', 'Cập nhật thành công!');
        } else {
            return redirect()->back()->with('status-warning-role', 'Bạn không đủ thẩm quyển để set role');
        }
    }
    public function  printbill($id)
    {
        $ordersv = Orders::where('id', $id)->first();
        if ($ordersv) {
            return view("admin.printbill", compact("ordersv"));
        }
    }
    public function  details()
    {
        $details = Detail::all();
        $user = User::where('id', Auth::id())->first();
        return view("admin.detail", compact("details", "user"));
    }
    public function deletedetails($id){
        $details = Detail::where('id' , $id)->first();
        $details->delete();
        return redirect('details')->with('status-details-delete', 'Hóa đơn đã được xóa');
    }
}
