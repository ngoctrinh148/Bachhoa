<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        if(Auth::check()){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cate = Category::where('status', '0')->get();
        return view("frontend.wishlist", compact("wishlist", 'cate'));
        }else{
            return redirect('/')->with('status-warning-login', 'Slug does not exist!');
        }
    }
    public function addToWishlist(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id)){
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => 'Đã thêm vào danh sách yêu thích']);
            }
        }else{
            return response()->json(['status' => 'Login to continue']);
        }
    }
    public function deletewishlist(Request $request){
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wishitem = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishitem->delete();
                return response()->json(['status' => "Sản phẩm đã được xóa thành công"]);
            }
        } else {
            return response()->json(['status' => "Bạn cần đăng nhập để tiếp tục"]);
        }
    }
    public function wishlistcount(){
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response ()->json(['count' => $wishlistcount]);
    }
}
