<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    // Chỉ định chính xác tên bảng trong SQL Server
    protected $table = 'vai_tro';

    // Cho phép thêm dữ liệu vào cột này
    protected $fillable = ['ten_vai_tro'];
}