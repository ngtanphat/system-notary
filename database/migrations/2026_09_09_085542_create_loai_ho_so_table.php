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
        Schema::create('loai_ho_so', function (Blueprint $table) {
            $table->id();
            $table->string('ten_loai', 150);
            $table->string('tien_to_ma', 20)->comment('VD: HĐ-MB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_ho_so');
    }
};
