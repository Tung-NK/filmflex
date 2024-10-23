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
    public function postRegister(LoginRequest $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('login')->with('success','Đăng ký thành công vui lòng đăng nhập!');
    }
    public function postlogin( Request $request){
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Vui lòng nhập Email!',
            'email.email' => 'Vui lòng nhập Email hợp lệ!',
            'password.required' => 'Vui lòng nhập Password!',
        ]);
        if (Auth::attempt($validate, $request->filled('remember'))) {
            // Xác thực thành công
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Đăng nhập thành công!');
        }

        // Xác thực thất bại
        return back()->withErrors([
            'error' => 'Email hoặc Password không đúng.',
        ])->withInput($request->only('email', 'remember'));
    }
    public function logoutuser(){
        Auth::logout();
        return redirect()->back();
    }
}
