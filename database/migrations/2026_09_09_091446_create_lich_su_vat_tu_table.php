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
        Schema::create('lich_su_vat_tu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vat_tu_id')->constrained('vat_tu');
            $table->foreignId('nguoi_dung_id')->constrained('nguoi_dung');
            $table->integer('so_luong_da_lay')->comment('Quy ra đơn vị nhỏ nhất');
            $table->string('hanh_dong', 100)->comment('Lấy đồ, Bổ sung kho');
            $table->dateTime('thoi_gian')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_vat_tu');
    }
};
