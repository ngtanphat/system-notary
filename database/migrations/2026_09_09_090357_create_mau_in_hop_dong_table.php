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
        Schema::create('mau_in_hop_dong', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mau_in', 255);
            $table->foreignId('loai_ho_so_id')->constrained('loai_ho_so');
            $table->text('noi_dung_html_mau')->nullable()->comment('Chứa mã HTML và các biến');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mau_in_hop_dong');
    }
};
