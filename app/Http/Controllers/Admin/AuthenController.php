<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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

        if (session()->has('loggedInUser')) {
            session()->pull('loggedInUser');
            return redirect()->route('formLogin');
        }
    }

    public function forgotPass()
    {
        return view('admin.authentication.forgot');
    }

    public function forgotPassPost(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email', 'exists:users']
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $req->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('admin.authentication.forget-pass', ['token' => $token], function ($mes) use ($req) {
            $mes->to($req->email);
            $mes->subject("Reset Password");
        });

        return redirect()->route('forgotPass')->with([
            'messageErr' => 'Vui lòng kiếm tra email của bạn'
        ]);
    }

    public function resetPass($token)
    {
        return view('admin.authentication.newpass', compact('token'));
    }

    public function resetPostPass(Request $req)
    {
        $req->validate([
            'email' => "required|email|exists:users",
            'password' => "required",
            'passCf' => "required|same:password",
        ]);

        $updatePass = DB::table('password_reset_tokens')->where([
            'email' => $req->email,
            'token' => $req->token
        ])->first();

        // if (!$updatePass) {
        //     return redirect()->route('resetPass', ['token' => $req->token])->with([
        //         'messageErr' => 'Lỗi'
        //     ]);
        // }

        User::where('email', $req->email)->update(['password' => Hash::make($req->password)]);
        DB::table('password_reset_tokens')->where(['email' => $req->email])->delete();
        return redirect()->route('formLogin')->with([
            'messageErr' => 'Reset password thành công'
        ]);
    }

}
