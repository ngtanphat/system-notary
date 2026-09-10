<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    protected $table = 'ho_so';

    // guarded rỗng [] nghĩa là cho phép thêm dữ liệu vào TẤT CẢ các cột
    protected $guarded = []; 
}