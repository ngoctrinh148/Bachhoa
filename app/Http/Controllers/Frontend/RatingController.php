<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request){
        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');
        

        $product_check = Product::where('id', $product_id)->where('status', '0')->first();
        if($product_check){
            $verified_purchase = Orders::where('orders.user_id', Auth::id())
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('order_items.prod_id', $product_id)
            ->get();

            if($verified_purchase){
                $existsing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if($existsing_rating){
                    $existsing_rating->stars_rated = $stars_rated;
                    $existsing_rating->update();
                }else{
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $stars_rated,
                    ]);
                }
               return redirect()->back()->with('status','Cảm ơn bạn đã đánh giá sản phẩm');
            }else{
                return redirect()->back()->with('status', 'Bạn không thể đánh giá sản phẩm');
            }
        }else{
            return redirect()->back()->with('status', 'Đường dẫn không tồn tại');
        }
    }
}
