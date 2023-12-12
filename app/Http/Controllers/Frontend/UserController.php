<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $order = Orders::where('user_id', auth()->id())->get();
        return view("frontend.order.index", compact("order"));
    }
    public function view($id){
        $orders = Orders::where('user_id', Auth::id())->where('id', $id)->first();
        return view('frontend.order.view', compact('orders'));
    }
}
