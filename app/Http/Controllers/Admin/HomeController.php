<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.categories.index');
        }
        return view('admin.login');
    }

    public function store(Request $request)
    {
        // Cột email đang dùng làm tên đăng nhập nên không ràng buộc định dạng email
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ], [
            'email.required' => 'Vui lòng nhập tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        $credentials = $validator->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['success' => true]);
        }

        return response()->json(['error' => "Tài khoản mật khẩu không chính xác"]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
