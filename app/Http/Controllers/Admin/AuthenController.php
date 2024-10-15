<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenController extends Controller
{
    public function formLogin()
    {
        return  view('admin.authentication.login');
    }

    // public function postLogin(Request $req)
    // {
    //     $req->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ], [
    //         'email.required' => 'Không được bỏ trống email',
    //         'email.email' => 'Nhập đúng định dạng email',
    //         'password.required' => 'Không được bỏ trống password'
    //     ]);

    //     if (Auth::attempt([
    //         'email' => $req->email,
    //         'password' => $req->password,
    //     ])) {
    //         if (Auth::user()->role == '0') {
    //             return redirect() -> route('accountlist');
    //             // return response()->json(['redirect' => route('accountlist')]); 
    //         } else {
    //             return redirect() -> route('formLogin') -> with([
    //                 'err' => "Tài khoản không có quyền truy cập"
    //             ]);
    //             // return response()->json([
    //             //     'errors' => [
    //             //         'general' => ['Đăng nhập với tài khoản Admin']
    //             //     ]
    //             // ], 401); // Trả về lỗi 401
    //         }
    //     } else {
    //         return redirect() -> route('formLogin') -> with([
    //             'err' => "Tài khoản không tồn tại"
    //         ]);
    //         // return response()->json([
    //         //     'errors' => [
    //         //         'general' => ['Tài khoản không tồn tại']
    //         //     ]
    //         // ], 401); // Trả về lỗi 401
    //     }
    // }

    public function postLogin(Request $req)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Nếu có lỗi validate, trả về lỗi
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = User::where('email', $req->email)->first();

            if ($user) {
                if (Hash::check($req->password, $user->password)) {
                    if ($user->role == 0) {
                        $req->session()->put('loggedInUser', $user->user_id);
                        $req->session()->put('loggedInUserName', $user->name);
                        return response()->json([
                            'status' => 200,
                            'messages' => 'success',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 403,
                            'messages' => 'Bạn không có quyền truy cập vào trang Admin'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'Mật khẩu không chính xác'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'Người dùng không tồn tại'
                ]);
            }
        }
    }


    public function logout()
    {
        // Auth::logout();
        // return redirect()->route('formLogin')->with([
        //     'err' => 'Đăng xuất thành công'
        // ]);

        if(session()->has('loggedInUser')){
            session() -> pull('loggedInUser');
            return redirect()->route('formLogin');
        }
    }
}
