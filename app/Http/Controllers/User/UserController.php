<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('users.authentication.login');
    }
    public function register(){
        return view('users.authentication.register');
    }
    public function postRegister(Request $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('login')->with('success','Đăng ký thành công vui lòng đăng nhập!');
    }
    public function postlogin( Request $request){
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        }
        return redirect()->back()->with('error','Sai Tài Khoản Hoặc Mật Khẩu');
    }
    public function logoutuser(){
        Auth::logout();
        return redirect()->back();
    }
}
