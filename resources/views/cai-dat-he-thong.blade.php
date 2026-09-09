@extends('layouts.app')
@section('title', 'Cài Đặt Hệ Thống')

@section('content')
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff] pb-24">
    <div class="max-w-[1100px] mx-auto flex flex-col gap-6 sm:gap-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Cài Đặt Hệ Thống</h1>
                <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium">Cấu hình tham số vận hành và quy trình tự động.</p>
            </div>
        </div>

        <form class="flex flex-col gap-6" @submit.prevent>
            
            <!-- SECTION 1: CẤU HÌNH KHÓA SỔ TỰ ĐỘNG -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-700 bg-white p-1 rounded-md shadow-sm">event_busy</span>
                    <h3 class="font-bold text-[15px] text-slate-900 uppercase">Cấu hình Khóa sổ Tự động</h3>
                </div>
                
                <div class="p-6 space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100">
                        <div>
                            <h4 class="font-bold text-[14px] text-slate-800">Kích hoạt tự động</h4>
                            <p class="text-[13px] text-slate-500 mt-0.5 italic">Hệ thống sẽ tự động khóa hồ sơ khi đến ngày chốt.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer shrink-0">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        </label>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h4 class="font-bold text-[14px] text-slate-800">Ngày chốt sổ hàng tháng</h4>
                            <p class="text-[13px] text-slate-500 mt-0.5 italic">Ví dụ: Chọn 10, hệ thống khóa vào 00:00 ngày 10.</p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <input type="number" value="10" min="1" max="31" class="w-20 bg-white border border-slate-300 rounded-lg px-3 py-2 text-[14px] text-center font-bold text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all">
                            <span class="text-[14px] font-medium text-slate-600 bg-slate-100 px-3 py-2 rounded-lg border border-slate-200">hàng tháng</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: CẤU HÌNH BẢO MẬT FILE SCAN -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-700 bg-white p-1 rounded-md shadow-sm">security</span>
                    <h3 class="font-bold text-[15px] text-slate-900 uppercase">Cấu hình Bảo mật File Scan</h3>
                </div>
                
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h4 class="font-bold text-[14px] text-slate-800">Thời gian xem tài liệu (sau khi cấp quyền)</h4>
                            <p class="text-[13px] text-slate-500 mt-0.5 italic">Thiết lập số phút tối đa nhân viên được phép xem file PDF sau khi Trưởng Văn Phòng nhấn nút Chấp nhận.</p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <input type="number" value="5" min="1" class="w-20 bg-white border border-slate-300 rounded-lg px-3 py-2 text-[14px] text-center font-bold text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all">
                            <span class="text-[14px] font-medium text-slate-600 bg-slate-100 px-3 py-2 rounded-lg border border-slate-200">phút</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="button" @click="$dispatch('notify', 'Đã lưu cấu hình hệ thống thành công!')" class="px-8 py-3 bg-slate-800 text-white rounded-xl font-bold text-[14px] shadow-md hover:bg-slate-900 transition-all active:scale-95 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">save</span> Lưu thay đổi
                </button>
            </div>
        </form>

    </div>
</div>
@endsection