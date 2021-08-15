<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class page extends Controller
{
    public function getIndex()
    {
        $product = Product::orderBy('id','asc')->get();
        return view('front_end/index',compact('product'));
    }
    public function shop()
    {   
        $category = Category::all();
        $product = Product::paginate(9);
        return view('front_end\shop', compact('product', 'category'));
    }
    public function product($id, Request $request)
    {   
        $category = Category::all();
        $product = Product::where('category_id',$id)->get();
        return view('front_end/product', compact('product','category'));
    }

    public function detail_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $relatedProduct = Product::orderBy('category_id', 'asc')->take(4)->get();
        return view('front_end/detailProduct', compact('product','relatedProduct','category'));
    }

    public function search(Request $request)
    {
        $category = Category::all();
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $product = Product::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $product = Product::all();
        }

        return view('front_end/product',compact('category','product'), [
            'data' => $product
        ]);
    }

    public function fillter(Request $request)
    {
        $category = Category::all();
        if($request->has('price') == true){
            switch($request->get('price')){
                case 1:
                    $product = Product::where('price','<','1000000')->get() ;
                    break;
                case 2:
                    $product = Product::whereBetween('price',[1000000,2000000])->get() ;
                    break;
            }
        }
        return view('front_end/product',compact('category','product'), [
            'data' => $product
        ]);
    }
}
