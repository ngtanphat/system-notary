<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use Notifiable;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'vai_tro_id',
        'ten_dang_nhap',
        'ho_ten',
        'mat_khau',
        'trang_thai'
    ];

    // Ẩn mật khẩu khi lấy dữ liệu ra để bảo mật
    protected $hidden = [
        'mat_khau',
    ];

    // Báo cho Laravel biết cột mật khẩu của chúng ta tên là 'mat_khau'
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}
