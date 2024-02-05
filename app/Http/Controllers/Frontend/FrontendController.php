<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $feature_products = Product::where('trending', '1')->take(15)->get();
        $all_products = Product::where('status', '0')->get();
        $trending_categories = Category::where('popular', '1')->take(15)->get();
        $cate = Category::where('status', '0')->get();
        return view('frontend.index', compact('feature_products', 'trending_categories', 'cate', 'all_products'));
    }
    public function sidecate()
    {
        $cate = Category::where('status', '0')->get();
        return response()->json(['cate' => $cate]);
    }
    public function category()
    {
        $cate = Category::where('status', '0')->get();
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }
    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $cate = Category::where('status', '0')->get();
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products','cate'));
        } else {
            return redirect('/')->with('status', 'Slug does not exist!');
        }
    }
    public function viewproducts($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $products = Product::where('slug', $prod_slug)->first();
                $cate = Category::where('status', '0')->get();
                $prod_id = Product::where('slug', $prod_slug)->get();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $review = Review::where('prod_id', $products->id)->get();
                $products_orther = Product::where('cate_id', $products->cate_id)->where('id', '!=', $prod_id)->first();
                $bough = 0; // Khởi tạo biến bough với giá trị mặc định là 0
                $order_prod = Orders::where('user_id', Auth::id())->get();
                if ($order_prod) {
                    foreach ($order_prod as $order) {
                        $order_item = OrderItem::where('order_id', $order->id)->where('prod_id', $products->id)->first();
                        if ($order_item) {
                            $check_ordered = Orders::where('id', $order_item->order_id)->where('status', '3')->first();
                            if($check_ordered){
                                $bough = 1; // Cập nhật biến bough thành 1 
                                break; 
                            }
                        }
                    }
                }
                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count();
                } else {
                    $rating_value = 0;
                }
                return view('frontend.products.view', compact('products', 'ratings', 'review', 'rating_value', 'user_rating', 'products_orther', 'bough','cate'));
            } else {
                return redirect('/')->with('status-error', 'The link was broken!!');
            }
        } else {
            return redirect('/')->with('status-error', 'No such category found!!');
        }
    }
    public function productslist()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searchproduct(Request $request)
    {
        $cate = Category::where('status', '0')->get();
        $search_product = $request->input('product_name');
        if ($search_product != '') {
            $products = Product::where('name', $search_product)->first();
            if ($products) {
                return redirect('category/' . $products->category->slug . '/' . $products->slug);
            } else {
                $products = Product::where('name', 'LIKE', '%' . $search_product . '%')->get();
                if ($products->count() > 1) {
                    return view('frontend.find', compact('products', 'search_product','cate'));
                } else {
                    return view('frontend.find', compact('products', 'search_product','cate'));
                }
            }
        } else {
            return redirect()->back()->with('status-search-warning', 'Bạn không sản phẩm nào cả');
        }
    }
    public function ortherproduct($id)
    {
        $products_orther = Product::where('id', '!=', $id)->first();
        return view('frontend.products.view', compact('products_orther'));
    }
}
