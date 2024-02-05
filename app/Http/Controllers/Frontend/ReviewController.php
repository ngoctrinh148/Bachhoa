<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addreview($product_slug)
    {
        $product = Product::where("slug", $product_slug)->where("status", '0')->first();
        if ($product) {
            $product_id = $product->id;
            $verified_purchase = Orders::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)
                ->get();
            return view('fronted.reviews.index', compact('product', '$verified_purchase'));
        } else {
            return redirect('')->back()->with('status', 'Đường dẫn không tồn tại');
        }
    }
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();
      
        if ($product) {
            $user_review = $request->input('userreview');
            $product_rating = $request->input('product_rating');
            $suggestion = $request->input('suggestion') == TRUE ? '1' : '0';

            $check_user = Review::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
            if($check_user){
                $reviewupdate = Review::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
                $reviewupdate->user_review = $request->input('userreview');
                $reviewupdate->update();
            }else{
                $new_ratings = Rating::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $product_id,
                    'stars_rated' => $product_rating,
                ]);
    
                $new_reviews =  Review::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $product_id,
                    'user_review' => $user_review,
                    'suggestion' => $suggestion,
                ]);
            }
            $category_slug = $product->category->slug;
            $prod_slug = $product->slug;
            if ($product) {
                return redirect('category/'.$category_slug.'/'.$prod_slug)->with('status', 'Cảm ơn bạn đã đánh giá sản phẩm');
            }
        } else {
            return redirect()->back()->with('status', 'Đường dẫn không tồn tại');
        }
    }
    public function delete($productsid , $id){
        $product = Product::where('id', $productsid)->first();

        $review = Review::find($id);
        $review->delete();
        return redirect('category/'.$product->category->slug.'/'.$product->slug)->with('status-delete-review', 'Đánh giá của bạn đã được xóa');
    }
}

