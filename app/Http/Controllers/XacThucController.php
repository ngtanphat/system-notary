<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XacThucController extends Controller
{
    public function xuLyDangNhap(Request $request)
    {
        // 1. Kiểm tra không được để trống form
        $request->validate([
            'ten_dang_nhap' => 'required',
            'mat_khau' => 'required',
        ]);

        // 2. Chuẩn bị chìa khóa để soi vào Database
        $credentials = [
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'password'      => $request->mat_khau, 
            'trang_thai'    => 1 // Quy tắc ngầm: Chỉ cho phép tài khoản đang 'Hoạt động' đăng nhập
        ];

        // 3. Tiến hành mở cửa
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công -> Tạo phiên làm việc mới
            $request->session()->regenerate();
            
            // Đẩy thẳng vào trang Tổng quan (Dashboard)
            return redirect()->route('dashboard'); 
        }

        // 4. Đăng nhập thất bại -> Trả về form đăng nhập kèm câu thông báo lỗi
        return back()->withErrors([
            'loi_dang_nhap' => 'Tài khoản hoặc mật khẩu không chính xác, hoặc đã bị khóa.',
        ])->onlyInput('ten_dang_nhap');
    }

    public function dangXuat(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}