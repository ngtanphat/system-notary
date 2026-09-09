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
        Schema::create('ho_so_khach_hang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ho_so_id')->constrained('ho_so');
            $table->foreignId('khach_hang_id')->constrained('khach_hang');
            $table->string('nhom_tham_gia', 50)->comment('Bên A, Bên B, Người làm chứng');
            $table->string('vai_ve', 50)->nullable()->comment('Vợ, Chồng, Con, Giám đốc...');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ho_so_khach_hang');
    }
};
