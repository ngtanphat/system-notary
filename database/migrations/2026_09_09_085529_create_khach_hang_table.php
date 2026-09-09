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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id();
            // Liên kết xem nhân viên nào tạo khách hàng này
            $table->foreignId('nguoi_tao_id')->constrained('nguoi_dung');
            $table->string('ho_ten', 100);
            $table->date('ngay_sinh')->nullable();
            $table->string('cccd', 20)->unique();
            $table->date('ngay_cap')->nullable();
            $table->string('noi_cap', 100)->nullable();
            $table->string('dia_chi', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hang');
    }
};
