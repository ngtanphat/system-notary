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
        Schema::create('ho_so', function (Blueprint $table) {
            $table->id();
            // Để nullable vì lúc mới tạo chưa có số, đợi AZ6 cấp mới update vào
            $table->string('so_cong_chung', 50)->nullable()->unique();

            $table->foreignId('loai_ho_so_id')->constrained('loai_ho_so');
            $table->foreignId('thu_ky_id')->constrained('nguoi_dung');
            $table->foreignId('ccv_id')->nullable()->constrained('nguoi_dung');

            $table->tinyInteger('trang_thai')->default(1)->comment('1: Nháp, 2: Chờ duyệt, 3: Đã xuất bản, 4: Đã hủy');

            $table->decimal('diem_thu_ky_de_xuat', 4, 2)->nullable();
            $table->decimal('diem_ccv_duyet', 4, 2)->nullable();
            $table->decimal('diem_admin_chot', 4, 2)->nullable();
            $table->decimal('tong_gia_tri', 15, 2)->nullable();

            // Chứa đoạn văn xuôi do thư ký gõ
            $table->text('can_cu_phap_ly')->nullable();

            // Chứa toàn bộ nội dung Hợp đồng đã trộn dữ liệu để in
            $table->text('noi_dung_html')->nullable();

            $table->dateTime('ngay_xuat_ban')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ho_so');
    }
};
