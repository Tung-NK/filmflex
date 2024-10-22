<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role', 0)->withTrashed()->paginate(5);
        return view('admin.admin.list-admin', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.add-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'required|nullable|image|max:5000',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|string|max:15|min:9',
        ]);

        // Lưu ảnh avatar nếu có
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('admin_avatars', 'public');
        }

        // Tạo user mới
        User::create([
            'name' => $request->name,
            'avatar' => $avatarPath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 0
        ]);

        return redirect()->route('admin-management.admins.index')->with('success', 'Admin created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $admin = User::findOrFail($user_id);
        return view('admin.admin.detail-admin', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        $admin = User::findOrFail($user_id);
        return view('admin.admin.update-admin', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:5000',
            'email' => 'required|email|unique:users,email,' . $user_id . ',user_id', // Cần chỉ định cột 'user_id' để loại trừ
            'password' => 'nullable|min:8',
            'phone' => 'required|string|max:15|min:9',
        ]);

        $admin = User::findOrFail($user_id);
        if ($request->hasFile('avatar')) {
            if ($admin->avatar) {
                Storage::disk('public')->delete($admin->avatar);
            }
            $avatarPath = $request->file('avatar')->store('admin_avatars', 'public');
            $admin->avatar = $avatarPath;
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->phone = $request->phone;
        $admin->save();

        return redirect()->route('admin-management.admins.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin-management.admins.index');
    }
    public function restore($id)
    {
        $admin = User::withTrashed()->find($id);
        if ($admin) {
            $admin->restore();
            return back()->with('success', 'admin restored.');
        }

        return back()->with('error', 'admin not found.');
    }
    //xóa vĩnh viễn
    public function forceDelete($id)
    {
        $admin = User::withTrashed()->find($id);
        if ($admin) {
            if ($admin->image && Storage::exists($admin->image)) {
                Storage::delete($admin->image);
            }
            $admin->forceDelete();
            return back()->with('success', 'admin permanently deleted.');
        }

        return back()->with('error', 'admin not found.');
    }
}
