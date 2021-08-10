<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class page extends Controller
{
    public function getIndex()
    {
        $product = Product::all();

        return view('front_end/index',compact('product'));
    }
}
