<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Hash;

class TaoTaiKhoanAdmin extends Command
{
    // Bổ sung thêm 2 biến nhận dữ liệu trực tiếp: {username?} và {fullname?}
    protected $signature = 'ntm:tao-admin {username?} {fullname?}';

    protected $description = 'Tạo tài khoản Quản trị viên cấp cao nhất cho hệ thống NotaryOS';

    public function handle()
    {
        $this->info('=== CÔNG CỤ KHỞI TẠO TÀI KHOẢN ADMIN ===');

        // Ưu tiên lấy dữ liệu từ dòng lệnh truyền vào, nếu không có mới hiển thị câu hỏi
        $tenDangNhap = $this->argument('username') ?: $this->ask('Nhập Tên đăng nhập');
        $hoTen = $this->argument('fullname') ?: $this->ask('Nhập Họ và tên hiển thị');
        
        // Mật khẩu thì luôn phải ẩn nên vẫn dùng secret()
        $matKhau = $this->secret('Nhập Mật khẩu (Khi gõ sẽ không hiện ký tự)');

        if (NguoiDung::where('ten_dang_nhap', $tenDangNhap)->exists()) {
            $this->error('Lỗi: Tên đăng nhập này đã tồn tại trong hệ thống!');
            return;
        }

        $adminRole = VaiTro::firstOrCreate(['ten_vai_tro' => 'Quản trị viên']);
        VaiTro::firstOrCreate(['ten_vai_tro' => 'Công chứng viên']);
        VaiTro::firstOrCreate(['ten_vai_tro' => 'Thư ký']);

        NguoiDung::create([
            'vai_tro_id' => $adminRole->id,
            'ten_dang_nhap' => $tenDangNhap,
            'ho_ten' => $hoTen,
            'mat_khau' => Hash::make($matKhau),
            'trang_thai' => 1,
        ]);

        $this->info('Thành công! Tài khoản Admin đã được tạo và sẵn sàng sử dụng.');
    }
}