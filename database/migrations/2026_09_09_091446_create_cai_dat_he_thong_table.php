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
        Schema::create('cai_dat_he_thong', function (Blueprint $table) {
            $table->id();
            $table->boolean('khoa_so_tu_dong')->default(true);
            $table->integer('ngay_chot_so')->default(1);
            $table->integer('thoi_gian_xem_file')->default(5)->comment('Đơn vị: phút');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cai_dat_he_thong');
    }
};
