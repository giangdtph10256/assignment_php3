<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CateController extends Controller
{
    public function index(Request $request)
    {
        $listCate = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $listCate = Category::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $listCate = Category::all();
        }
        $ListCate = Category::all();
        $ListCate->load(['products']);      
        return view('admin/categories/index', ['data' => $ListCate,]);
    }

    public function show(){}
    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name' => 'required|min:3|max:30',
            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
        $data =  $request->except('_token');
        $result = Category::create($data);
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $cate)
    {
        return view('admin/categories/edit', ['cate' => $cate]);
    }

    public function update(Request $request , Category $cate)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name' => 'required|min:6|max:30|alpha',
            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
        $data = request()->except('_token');

        $cate->update($data);


        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $cate)
    {
        $cate->delete($cate);
        return redirect()->route('admin.categories.index');
    }
}
