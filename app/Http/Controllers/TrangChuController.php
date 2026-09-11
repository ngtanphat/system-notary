<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoSo; // Khai báo Model Hồ Sơ
use Carbon\Carbon;

class TrangChuController extends Controller
{
    public function index()
    {
        // 1. Lấy mốc thời gian hiện tại
        $namNay = Carbon::now()->year;
        $thangNay = Carbon::now()->month;
        $homNay = Carbon::now()->startOfDay();

        // 2. Thu thập các con số thống kê (Giả định các trường trong DB)
        // Lưu ý: Tạm comment lại nếu bạn chưa tạo bảng ho_so trong SQL Server
        /*
        $tongHoSoNam = HoSo::whereYear('created_at', $namNay)->count();
        $tongHoSoThang = HoSo::whereYear('created_at', $namNay)->whereMonth('created_at', $thangNay)->count();
        $hoSoHoanTatHomNay = HoSo::where('trang_thai', 'Đã XB')->where('created_at', '>=', $homNay)->count();
        $hoSoNhap = HoSo::where('trang_thai', 'Nháp')->count();

        // 3. Lấy 10 hồ sơ mới nhất để hiển thị ra bảng
        $danhSachHoSo = HoSo::with(['benA', 'benB'])->orderBy('created_at', 'desc')->take(10)->get();
        */

        // DỮ LIỆU TẠM (Dummy Data) để bạn test giao diện trước khi kết nối DB thật:
        $tongHoSoNam = 111;
        $tongHoSoThang = 45;
        $hoSoHoanTatHomNay = 8;
        $hoSoNhap = 12;
        $danhSachHoSo = []; // Tạm để mảng rỗng hoặc tạo vài mảng tĩnh để test

        // 4. Đóng gói và gửi sang View
        return view('trang-chu', compact(
            'tongHoSoNam', 
            'tongHoSoThang', 
            'hoSoHoanTatHomNay', 
            'hoSoNhap', 
            'danhSachHoSo'
        ));
    }
}