@extends('layouts.app')
@section('title', 'Quản Lý VPP')

@section('content')
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff] pb-24">
    <div class="w-full flex flex-col gap-6 sm:gap-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Văn Phòng Phẩm</h1>
                <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium">Quản lý cấp phát, tồn kho và lịch sử sử dụng.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-6 py-3 bg-blue-600 rounded-xl font-bold text-sm text-white shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">add</span> Thêm mã vật tư
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-5 gap-6 items-start relative z-10 pb-10">
            
            <!-- CỘT TRÁI: DANH SÁCH VẬT TƯ -->
            <div class="xl:col-span-3 bg-white rounded-3xl border border-slate-200 shadow-sm flex flex-col w-full overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between sm:items-center gap-4 rounded-t-3xl bg-white">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 shrink-0">
                            <span class="material-symbols-outlined">inventory_2</span>
                        </div>
                        <h2 class="font-bold text-xl text-slate-900 tracking-tight">Danh Sách Vật Tư</h2>
                    </div>
                    <div class="relative w-full sm:w-auto shrink-0">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                        <input type="text" placeholder="Tìm vật tư..." class="pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 transition-all w-full sm:w-64">
                    </div>
                </div>
                
                <div class="w-full overflow-x-auto pb-6 custom-scrollbar mobile-card-table">
                    <table class="w-full text-left border-collapse min-w-[700px]">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200">
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Tên Vật Tư</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">ĐVT</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Trong Tủ</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Kho Tổng</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-right">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                <td data-label="Tên Vật Tư" class="p-4">
                                    <span class="font-bold text-slate-900 text-[14px]">Giấy A4 Double A</span>
                                </td>
                                <td data-label="ĐVT" class="p-4 text-center text-[13px] font-medium text-slate-500">Ram</td>
                                <td data-label="Trong Tủ" class="p-4 text-center">
                                    <span class="bg-emerald-100 text-emerald-800 font-bold px-3 py-1 rounded-lg text-[13px] border border-emerald-200">10</span>
                                </td>
                                <td data-label="Kho Tổng" class="p-4 text-center">
                                    <span class="bg-slate-100 text-slate-700 font-bold px-3 py-1 rounded-lg text-[13px] border border-slate-200">150</span>
                                </td>
                                <td data-label="Thao Tác" class="p-4 text-right">
                                    <button @click="$dispatch('notify', 'Đã lấy 1 Ram Giấy A4')" class="px-4 py-1.5 bg-white border border-indigo-200 text-indigo-700 rounded-lg text-[12px] font-bold hover:bg-indigo-50 transition-colors shadow-sm">
                                        Lấy đồ
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                <td data-label="Tên Vật Tư" class="p-4">
                                    <span class="font-bold text-slate-900 text-[14px]">Bút bi xanh Thiên Long</span>
                                </td>
                                <td data-label="ĐVT" class="p-4 text-center text-[13px] font-medium text-slate-500">Hộp</td>
                                <td data-label="Trong Tủ" class="p-4 text-center">
                                    <span class="bg-emerald-100 text-emerald-800 font-bold px-3 py-1 rounded-lg text-[13px] border border-emerald-200">5</span>
                                </td>
                                <td data-label="Kho Tổng" class="p-4 text-center">
                                    <span class="bg-slate-100 text-slate-700 font-bold px-3 py-1 rounded-lg text-[13px] border border-slate-200">45</span>
                                </td>
                                <td data-label="Thao Tác" class="p-4 text-right">
                                    <button @click="$dispatch('notify', 'Đã lấy 1 Hộp Bút bi xanh')" class="px-4 py-1.5 bg-white border border-indigo-200 text-indigo-700 rounded-lg text-[12px] font-bold hover:bg-indigo-50 transition-colors shadow-sm">
                                        Lấy đồ
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CỘT PHẢI: TIMELINE LỊCH SỬ -->
            <div class="xl:col-span-2 bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sticky top-0 w-full h-[600px] flex flex-col">
                <h2 class="font-bold text-xl text-slate-900 tracking-tight flex items-center gap-2 mb-6 shrink-0">
                    <span class="material-symbols-outlined text-orange-500">history</span> Lịch Sử Cấp Phát
                </h2>
                
                <div class="flex-1 overflow-y-auto custom-scrollbar pr-2 relative before:absolute before:left-[19px] before:top-2 before:bottom-2 before:w-[2px] before:bg-slate-100">
                    <div class="flex gap-4 relative z-10 mb-6">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 border-4 border-white flex items-center justify-center text-emerald-600 shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-[18px]">front_hand</span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-[13px] font-bold text-slate-900">Nguyễn Văn A <span class="font-normal text-slate-600">đã lấy 1 Ram Giấy A4</span></p>
                            <p class="text-[11px] text-slate-500 mt-1">10:30 - Hôm nay</p>
                        </div>
                    </div>

                    <div class="flex gap-4 relative z-10 mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 border-4 border-white flex items-center justify-center text-blue-600 shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-[18px]">inventory</span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-[13px] font-bold text-slate-900">Admin <span class="font-normal text-slate-600">bổ sung 10 Hộp Bút bi lên tủ</span></p>
                            <p class="text-[11px] text-slate-500 mt-1">08:15 - Hôm qua</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection