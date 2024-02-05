<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $user = User::where('id', Auth::id())->first();
        return view('admin.category.index', compact('categories', 'user'));
    }

    public function add()
    {
        return view("admin.category.add");
    }
    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('asset/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->save();
        return redirect('categories')->with('status-add', 'Category add successfully!');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'asset/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('asset/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->update();
        return redirect('categories')->with('status-update', 'Category update successfully!');
    }
    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $check = Product::where('cate_id', $category->id)->first();
        if($check){
            return redirect('categories')->with('status-warning-delete', 'Category delete successfully!');
        }else{
            if ($category->image) {
                $path = 'asset/uploads/category/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $category->delete();
            return redirect('categories')->with('status-delete', 'Category delete successfully!');
        }
    }
}
