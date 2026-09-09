@extends('layouts.app')
@section('title', 'Thông Tin Tài Khoản')

@section('content')
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff] pb-24">
    <div class="max-w-[1100px] mx-auto flex flex-col gap-6 sm:gap-8">
        
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Cài Đặt Tài Khoản</h1>
                <p class="text-sm text-slate-500 mt-1 font-medium">Quản lý thông tin cá nhân và bảo mật hệ thống.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            <!-- CỘT TRÁI: PROFILE SUMMARY -->
            <div class="lg:col-span-1 bg-white rounded-3xl border border-slate-200 shadow-sm flex flex-col p-6 items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-blue-600 to-indigo-700"></div>
                
                <div class="relative mt-8 mb-4 group cursor-pointer">
                    <div class="w-28 h-28 rounded-full bg-white p-1.5 shadow-md relative z-10">
                        <div class="w-full h-full rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-black text-4xl">
                            A
                        </div>
                    </div>
                    <!-- Nút đổi Avatar hiển thị khi Hover -->
                    <div class="absolute inset-1.5 rounded-full bg-slate-900/60 z-20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-white text-3xl">photo_camera</span>
                    </div>
                </div>

                <h2 class="text-xl font-bold text-slate-900">Nguyễn Văn A</h2>
                <p class="text-[13px] font-semibold text-blue-600 uppercase tracking-wider mt-1 bg-blue-50 px-3 py-1 rounded-full border border-blue-100">
                    Quản Trị Viên
                </p>

                <div class="w-full border-t border-slate-100 my-5"></div>

                <div class="w-full space-y-3">
                    <div class="flex justify-between items-center text-[13px]">
                        <span class="text-slate-500 font-medium">Trạng thái:</span>
                        <span class="inline-flex items-center gap-1.5 text-emerald-600 font-bold">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Hoạt động
                        </span>
                    </div>
                    <div class="flex justify-between items-center text-[13px]">
                        <span class="text-slate-500 font-medium">Tên đăng nhập:</span>
                        <span class="text-slate-800 font-bold font-mono">NVA123</span>
                    </div>
                    <div class="flex justify-between items-center text-[13px]">
                        <span class="text-slate-500 font-medium">Ngày tham gia:</span>
                        <span class="text-slate-800 font-bold">15/08/2026</span>
                    </div>
                </div>
            </div>

            <!-- CỘT PHẢI: FORMS CẬP NHẬT -->
            <div class="lg:col-span-2 flex flex-col gap-6">
                
                <!-- CARD 1: THÔNG TIN CÁ NHÂN -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
                    <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                        <span class="material-symbols-outlined text-blue-600">manage_accounts</span> Thông Tin Cá Nhân
                    </h3>

                    <!-- Dùng @submit.prevent để chặn reload trang khi submit form -->
                    <form class="space-y-5" @submit.prevent>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Họ tên -->
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Họ và Tên</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">person</span>
                                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] text-slate-900 font-medium focus:outline-none focus:border-blue-500 transition-all" type="text" value="Nguyễn Văn A">
                                </div>
                            </div>
                            
                            <!-- CMND/CCCD -->
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Số CMND / CCCD</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">badge</span>
                                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] text-slate-900 font-medium focus:outline-none focus:border-blue-500 transition-all" type="text" value="079090123456">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Địa chỉ Email</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">mail</span>
                                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] text-slate-900 font-medium focus:outline-none focus:border-blue-500 transition-all" type="email" value="nva@congchungntm.vn">
                                </div>
                            </div>

                            <!-- SĐT -->
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Số điện thoại</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">call</span>
                                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] text-slate-900 font-medium focus:outline-none focus:border-blue-500 transition-all" type="text" value="0901 234 567">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="button" @click="$dispatch('notify', 'Đã lưu thông tin cá nhân!')" class="px-6 py-2.5 bg-blue-600 text-white rounded-xl font-bold text-[13px] shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all active:scale-95 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">save</span> Lưu Thông Tin
                            </button>
                        </div>
                    </form>
                </div>

                <!-- CARD 2: ĐỔI MẬT KHẨU -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-amber-400"></div>

                    <h3 class="text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
                        <span class="material-symbols-outlined text-amber-500">lock_reset</span> Đổi Mật Khẩu
                    </h3>
                    <p class="text-[13px] text-slate-500 mb-6 border-b border-slate-100 pb-4">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác.</p>

                    <form class="space-y-5" @submit.prevent>
                        <div class="space-y-1.5 max-w-md">
                            <label class="text-[13px] font-semibold text-slate-700 block">Mật khẩu hiện tại <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">key</span>
                                <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] focus:outline-none focus:border-amber-500 transition-all" type="password" placeholder="Nhập mật khẩu cũ">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Mật khẩu mới <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">lock</span>
                                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] focus:outline-none focus:border-amber-500 transition-all" type="password" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                            
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Xác nhận mật khẩu mới <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">lock</span>
                                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-[14px] focus:outline-none focus:border-amber-500 transition-all" type="password" placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="button" @click="$dispatch('notify', 'Cập nhật mật khẩu thành công!')" class="px-6 py-2.5 bg-slate-800 text-white rounded-xl font-bold text-[13px] shadow-md hover:bg-slate-900 transition-all active:scale-95 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">update</span> Đổi Mật Khẩu
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection