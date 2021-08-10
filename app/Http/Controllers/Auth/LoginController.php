<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function GetLoginForm() {
        return view('auth/login');
    }

    public function PostLogin(Request $request) {
      if ($request->isMethod('post')) {
        $validator = Validator::make($request->all(),[
             'email' => 'required|email',
              'password' => 'required',
        ]);
     if($validator->fails()){
         return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
     }
     }
      $arr = [
        'email' => $request->email,
        'password' => $request->password,
      ];
      if(Auth::attempt($arr)){
// Đăng nhập đúng
        if(Auth::user()->role==1){
          return redirect()->route('front_end.index');
        }else{
          return redirect()->route('layout');
        }
      }else{
// Đăng nhập sai 
        return back();
      }
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('auth.getLoginForm');
    }
}