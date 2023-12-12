<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product_id = $request->input("product_id");
        $product_qty = $request->input("product_qty");
        if (Auth::check()) {
            $prod_check = Product::where("id", $product_id)->first();
            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    $cartItem = Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
                    $cartItem->prod_qty += $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . ' đã được cập nhật số lượng!']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . ' đã được thêm vào giỏ hàng!']);
                }
            } else {
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function viewcart(Request $request)
    {
        $cartItems = Cart::where("user_id", Auth::id())->get();
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (!Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
        return view('frontend.cart', compact('cartItems'));
    }
    public function deleteproduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItems = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItems->delete();
                return response()->json(['status' => "Sản phẩm đã được xóa thành công"]);
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function updatequantity(Request $request)
    {
        $prod_id = $request->input("prod_id");
        $products_qty = $request->input("prod_qty");
        if (Auth::check()) {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $products_qty;
                $cart->update();
                return response()->json(['status' => 'Số lượng đã được cập nhật!!']);
            }
        } else {
            return response()->json(["status" => "Login to continue"]);
        }
    }
    public function cartcount(){
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response ()->json(['count' => $cartcount]);
    }
}
