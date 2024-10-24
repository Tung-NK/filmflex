<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function detailUser()
    {
        return view('users.account.profile');
    }

    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $path = $user->avatar;

        $user->name = $req->input('name');
        $user->phone = $req->input('phone');

        if ($req->hasFile('image')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $image = $req->file('image');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('user', $newName, 'public');
            $user->avatar = $path;
        }

        $user->save();
        return redirect()->back();
    }

    public function changePass(Request $req)
    {
        $req->validate([
            'oldpass' => 'required',
            'newpass' => 'required|confirmed',
        ]);

        if (!Hash::check($req->oldpass, Auth::user()->password)) {
            return redirect()->route('account.detailUser')->with([
                'messageErr' => 'Mật khẩu cũ không đúng'
            ]);
        }

        User::where('user_id', auth()->user()->user_id)->update([
            'password' => Hash::make($req->newpass)
        ]);

        Auth::logout();
        return redirect()->route('login')->with('error', 'Đổi mật khẩu thành công! Vui lòng đăng nhập lại');
    }
}
