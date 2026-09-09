@extends('layouts.app')
@section('title', 'Quản Lý Tài Khoản')

@section('content')
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff]" x-data="{ userModal: false }">
    <div class="max-w-[1400px] mx-auto flex flex-col gap-6 sm:gap-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Quản Lý Tài Khoản</h1>
                <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium">Danh sách nhân sự và phân quyền hệ thống.</p>
            </div>
        </div>

        <!-- Bộ Lọc & Nút Thêm -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 flex flex-col xl:flex-row justify-between items-center gap-4 z-10">
            <div class="flex flex-wrap items-center gap-3 w-full xl:w-auto">
                <div class="relative w-full sm:w-64">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                    <input type="text" placeholder="Tìm tên, username..." class="pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all w-full">
                </div>
                <select class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 outline-none focus:border-blue-500 w-full sm:w-auto cursor-pointer">
                    <option>-- Tất cả vai trò --</option>
                    <option>Admin</option>
                    <option>Công chứng viên</option>
                    <option>Thư ký</option>
                </select>
                <select class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 outline-none focus:border-blue-500 w-full sm:w-auto cursor-pointer">
                    <option>-- Trạng thái --</option>
                    <option>Hoạt động</option>
                    <option>Đã khóa</option>
                </select>
            </div>
            
            <button @click="userModal = true" class="w-full xl:w-auto flex items-center justify-center gap-2 px-6 py-2.5 bg-slate-900 rounded-xl font-bold text-sm text-white shadow-lg hover:bg-slate-800 transition-all active:scale-95 whitespace-nowrap">
                <span class="material-symbols-outlined text-[20px]">person_add</span> Thêm tài khoản mới
            </button>
        </div>

        <!-- Bảng Dữ Liệu -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
            <!-- Đã thêm class overflow-x-auto để bảng không bị bóp méo khi thu nhỏ -->
            <div class="w-full overflow-x-auto custom-scrollbar pb-2 mobile-card-table">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200">
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center w-16">ID</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Họ Và Tên</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Tên Đăng Nhập</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Vai Trò</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Trạng Thái</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-blue-50/30 transition-colors">
                            <td data-label="ID" class="p-4 text-center font-medium text-slate-500">1</td>
                            <td data-label="Họ Và Tên" class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm">A</div>
                                    <span class="font-bold text-slate-900 text-[14px]">Nguyễn Văn A</span>
                                </div>
                            </td>
                            <td data-label="Tên Đăng Nhập" class="p-4 font-bold text-slate-700">NVA123</td>
                            <td data-label="Vai Trò" class="p-4 text-center">
                                <span class="inline-flex items-center gap-1 bg-red-100 text-red-800 font-bold px-3 py-1 rounded-full text-[11px]"><span class="material-symbols-outlined text-[14px]">shield</span> Admin</span>
                            </td>
                            <td data-label="Trạng Thái" class="p-4 text-center">
                                <span class="inline-flex items-center gap-1.5 text-emerald-600 font-bold text-[13px]">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Hoạt động
                                </span>
                            </td>
                            <td data-label="Thao Tác" class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-500 hover:border-blue-500 hover:text-blue-600 transition-all flex items-center justify-center shadow-sm bg-white">
                                        <span class="material-symbols-outlined text-[16px]">edit_square</span>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg border border-slate-200 text-red-500 hover:border-red-500 hover:bg-red-50 transition-all flex items-center justify-center shadow-sm bg-white" title="Khóa tài khoản">
                                        <span class="material-symbols-outlined text-[16px]">lock</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Thêm Tài Khoản (Alpine.js) -->
    <div x-show="userModal" style="display: none;" class="fixed inset-0 z-[100] bg-slate-900/60 flex items-center justify-center backdrop-blur-sm" x-transition.opacity>
        <div @click.outside="userModal = false" class="bg-white rounded-3xl w-[90vw] sm:w-[450px] flex flex-col shadow-2xl overflow-hidden" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100">
            <div class="px-6 py-4 bg-slate-900 flex justify-between items-center text-white">
                <h3 class="text-lg font-bold">Thêm tài khoản mới</h3>
                <button @click="userModal = false" class="text-slate-400 hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>
            </div>
            <div class="p-6 space-y-4">
                <div class="space-y-1.5">
                    <label class="text-[13px] font-semibold text-slate-700 block">Tên đăng nhập <span class="text-red-500">*</span></label>
                    <input class="w-full border border-slate-300 rounded-xl px-3 py-2 text-[14px] focus:border-blue-500 outline-none" type="text" placeholder="VD: NVA123">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[13px] font-semibold text-slate-700 block">Họ và Tên hiển thị <span class="text-red-500">*</span></label>
                    <input class="w-full border border-slate-300 rounded-xl px-3 py-2 text-[14px] focus:border-blue-500 outline-none" type="text" placeholder="Nguyễn Văn A">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[13px] font-semibold text-slate-700 block">Phân quyền (Vai trò) <span class="text-red-500">*</span></label>
                    <select class="w-full border border-slate-300 rounded-xl px-3 py-2 text-[14px] focus:border-blue-500 outline-none bg-white">
                        <option>Thư ký</option>
                        <option>Công chứng viên</option>
                        <option>Quản trị viên (Toàn quyền)</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="text-[13px] font-semibold text-slate-700 block">Mật khẩu ban đầu <span class="text-red-500">*</span></label>
                    <input class="w-full border border-slate-300 rounded-xl px-3 py-2 text-[14px] focus:border-blue-500 outline-none" type="password" placeholder="••••••••">
                    <p class="text-[11px] text-slate-500 mt-1">Tài khoản mới bắt buộc phải có mật khẩu.</p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50 flex justify-end gap-3">
                <button @click="userModal = false" class="px-5 py-2 rounded-xl font-bold text-[13px] text-slate-600 hover:bg-slate-200 transition-colors">Hủy</button>
                <button @click="userModal = false; $dispatch('notify', 'Đã lưu tài khoản thành công!')" class="px-5 py-2 rounded-xl font-bold text-[13px] text-white bg-blue-600 hover:bg-blue-700 transition-colors">Lưu dữ liệu</button>
            </div>
        </div>
    </div>
</div>
@endsection