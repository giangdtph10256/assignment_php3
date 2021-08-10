<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $ListProd = Product::all();
        $ListProd->load(['category']);
        $listCate = Category::all();
        return view('admin/products/index', ['data' => $ListProd, 'listCate' => $listCate]);
    }
    public function show()
    {
    }

    public function create()
    {
        $listCate = Category::all();
        return view('admin.products.create', ['listCate' => $listCate]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:4|max:30',
                'image' => 'required|max:10000',
                'price' => 'required|integer',
                'quantity' => 'required|integer',
                'category_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $data =  request()->except('_token');
        $model = new Product();
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $listCate = Category::all();
        return view('admin.products.edit', ['product' => $product, 'listCate' => $listCate]);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:6|max:30|alpha',
                'image' => 'required|image|max:10000',
                'price' => 'required|integer',
                'quantity' => 'required|integer',
                'category_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $products = new Product;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $products->image = $filename;
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'image' => $filename,
        ]);
        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product)
    {

        $product->delete($product);
        return redirect()->route('admin.products.index');
    }
}
