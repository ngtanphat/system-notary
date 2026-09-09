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
        Schema::create('tai_san', function (Blueprint $table) {
            $table->id();
            $table->string('loai_tai_san', 50)->comment('Xe máy, Ô tô, Nhà đất...');
            // Cột JSON cực kỳ quan trọng để lưu động mọi loại thông tin
            $table->json('thong_tin_chi_tiet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_san');
    }
};
