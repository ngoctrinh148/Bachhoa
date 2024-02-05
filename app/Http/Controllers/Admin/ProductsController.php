<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Meta;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $user = User::where('id', Auth::id())->first();
        return view('admin.products.index', compact('products', 'user'));
    }
    public function add()
    {
        $category = Category::all();
        return view('admin.products.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('asset/uploads/products', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->cate_id = $request->input('cate_id');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->discount = $request->input('discount');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->save();

        $products_detail = Product::where('name', $request->input('name'))->first();
        $detail = new Detail();
        $detail->product_id = $products_detail->id;
        $detail->prod_qty = $request->input('qty');
        $detail->id_user = Auth::id();
        $detail->save();
        
        return redirect('products')->with('status-add', 'Product added successfully!');
    }
    public function edit($id)
    {
        $products = Product::find($id);
        $category = Category::all();
        return view('admin.products.edit', compact('products', 'category'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $last_qty = $products->qty;

        if ($request->hasFile('image')) {
            $path = 'asset/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('asset/uploads/products', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->cate_id = $request->input('cate_id');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->discount = $request->input('discount');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
       
     
        $products->update();

        $detail = new Detail();
        $detail->product_id = $id;
        $detail->prod_qty = ($request->input('qty') - $last_qty);
        $detail->id_user = Auth::id();
        $detail->save();
        return redirect('products')->with('status-update', 'Products update successfully!');
    }
    public function delete($id)
    {
        $products = Product::find($id);
        $path = 'asset/uploads/products/' . $products->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $products->delete();
        return redirect('products')->with('status-delete', 'Products deleted successfully!');
    }
}
