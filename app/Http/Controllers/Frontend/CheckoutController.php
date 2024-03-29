<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Orders;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $remoteItems = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                // $remoteItems->delete();
            }
        }
        $cate = Category::where('status', '0')->get();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $user = Auth::user();
        return view("frontend.checkout", compact("cartItems", "user", 'cate'));
    }
    public function placeorder(Request $request)
    {
        $orders = new Orders();

        $orders->user_id = Auth::id();
        $orders->name = $request->input('name');
        $orders->email = $request->input('email');
        $orders->phone = $request->input('phone');
        $orders->address1 = $request->input('address1');
        $orders->ward = $request->input('ward');
        $orders->district = $request->input('district');
        $orders->city = $request->input('city');

        $total = 0;
        $cartItem_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItem_total as $itemtt) {
            if($itemtt->products->discount > 0){
                $total += ($itemtt->products->original_price - ($itemtt->products->original_price*($itemtt->products->discount/100))) * $itemtt->prod_qty;
            }else{
                $total += $itemtt->products->original_price * $itemtt->prod_qty;
            }
        }
        $orders->total_price = $total;

        $orders->tracking_no = 'nt' . rand(0000, 9999);
        $orders->save();

        $orders->id;

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $itemod) {
            if($itemod->products->discount > 0){
                $sprice = $itemod->products->original_price - ($itemod->products->original_price*($itemod->products->discount/100));
            }else{
                $sprice = $itemod->products->original_price;
            }
            OrderItem::create([
                'order_id' => $orders->id,
                'prod_id' => $itemod->products->id,
                'qty' => $itemod->prod_qty,
                'price' => $sprice,
            ]);
        }
        $productorder = Cart::where('user_id', Auth::id())->get();
        foreach ($productorder as $itemprod) {
            $prod_oder = Product::where('id', $itemprod->prod_id)->first(); 
            if($prod_oder){
                $prod_oder->qty = $prod_oder->qty - $itemprod->prod_qty;
                $prod_oder->save();
            }else{
                dd('fail');
            }
        }
        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();

            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->ward = $request->input('ward');
            $user->district = $request->input('district');
            $user->city = $request->input('city');
            $user->update();
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);


        return redirect('/')->with('status-order', 'Đơn hàng của bạn đã được đặt, hàng sẽ sớm được giao');
    }
    public function paycheck(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartItem as $item) {
            $total_price += $item->products->trending == '1' ? $item->products->selling_price : $item->products->origin_price * $item->prod_qty;

            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $address1 = $request->input('address1');
            $ward = $request->input('ward');
            $district = $request->input('district');
            $city = $request->input('city');
            $pincode = $request->input('pincode');

            return response()->json([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address1' => $address1,
                'ward' => $ward,
                'district' => $district,
                'city' => $city,
                'pincode' => $pincode,
                'total_price' => $total_price,
            ]);
        }
    }
}
