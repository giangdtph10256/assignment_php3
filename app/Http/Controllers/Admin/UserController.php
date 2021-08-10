<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Support\Facades\Validator;


class userController extends Controller
{
    public function index(Request $request){
        $listUser = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $listUser = User::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $listUser = User::all();
        }

        $listUser->load([
            'invoices',
        ]);

        return view('admin/users/index', [
            'data' => $listUser,
        ]);
    }

    public function show(){
        // $user = User::find($id);
        // // dd($id);
        
        // return view('admin/users/show', [
        //     'user' => $user,
        // ]);
    }

    public function create(){
        return view('admin/users/create');
    }

    public function store(Request $request){
        if ($request->isMethod('post')) {
           $validator = Validator::make($request->all(),[
                'name' => 'required|min:6|max:30|alpha',
                'email' => 'required|email',
                'password' => 'required|min:6|max:10',
                'address' => 'required',
                'gender' => 'required',
                'role' => 'required',
           ]);
        if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        }
        $data = $request->except('_token');
        $result = User::create($data);
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user) {
        return view('admin/users/edit', [
            'data' => $user,
        ]);
    }

    public function update(Request $request, User $user) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                 'name' => 'required|min:6|max:30|alpha',
                 'email' => 'required|email',
                 'password' => 'required|min:6|max:10',
                 'address' => 'required',
                 'gender' => 'required',
                 'role' => 'required',
            ]);
         if($validator->fails()){
             return redirect()->back()
                     ->withErrors($validator)
                     ->withInput();
         }
         }
        $data = $request->except('_token');
        $user->update($data);

        return redirect()->route('admin.users.index');
    }
    public function delete(User $user){
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
