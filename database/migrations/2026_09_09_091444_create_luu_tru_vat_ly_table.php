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
        Schema::create('luu_tru_vat_ly', function (Blueprint $table) {
            $table->id();
            // unique() vì mỗi bộ hồ sơ vật lý chỉ có một chỗ cất duy nhất trong kho
            $table->foreignId('ho_so_id')->unique()->constrained('ho_so');
            $table->string('tu_so', 50)->nullable();
            $table->string('ke_so', 50)->nullable();
            $table->string('hop_ho_so_so', 50)->nullable();
            $table->foreignId('nguoi_cat_tru_id')->constrained('nguoi_dung');
            $table->dateTime('ngay_cat_tru')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luu_tru_vat_ly');
    }
};
