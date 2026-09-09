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
        Schema::create('vat_tu', function (Blueprint $table) {
            $table->id();
            $table->string('ten_vat_tu', 255);
            $table->string('don_vi_lon', 50)->comment('Ram, Hộp...');
            $table->string('don_vi_nho', 50)->comment('Tờ, Cây...');
            $table->integer('ty_le_quy_doi')->comment('VD: 1 Ram = 500 Tờ');
            $table->integer('ton_kho_tong')->default(0)->comment('Lưu trữ bằng đơn vị nhỏ nhất');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vat_tu');
    }
};
