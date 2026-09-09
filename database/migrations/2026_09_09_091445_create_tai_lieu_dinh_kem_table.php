<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tai_lieu_dinh_kem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ho_so_id')->constrained('ho_so');
            $table->foreignId('nguoi_tai_len_id')->constrained('nguoi_dung');

            $table->string('ten_tai_lieu', 255);
            $table->string('duong_dan_file', 500);
            $table->string('dinh_dang', 20)->nullable()->comment('pdf, png, jpg...');

            $table->tinyInteger('phan_loai_tai_lieu')->comment('1: Giấy tờ đầu vào, 2: Bản scan mộc đỏ');
            $table->tinyInteger('loai_bao_mat')->default(1)->comment('1: Công khai nội bộ, 2: Cần cấp quyền');

            $table->dateTime('ngay_tai_len')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_lieu_dinh_kem');
    }
};
