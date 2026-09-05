@extends('layouts.app')
@section('title', 'Trang Chủ')

@section('content')
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff]">
    <div class="w-full flex flex-col gap-6 sm:gap-8">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Tổng Quan Hệ Thống</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('hoso.soan') }}" class="flex items-center gap-2 px-6 py-3 bg-blue-600 rounded-xl font-bold text-sm text-white shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-0.5 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">add</span> Tạo hồ sơ mới
                </a>
            </div>
        </div>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            <!-- Thẻ 1 -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-indigo-300 hover:shadow-xl hover:shadow-indigo-50 transition-all cursor-pointer relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-indigo-600">folder_copy</span>
                </div>
                <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">folder_copy</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Tổng hồ sơ (Năm)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">342</span>
                        <span class="text-indigo-500 text-xs font-bold mb-1.5 ml-1">Năm 2026</span>
                    </div>
                </div>
            </div>

            <!-- Thẻ 2 -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-50 transition-all cursor-pointer relative overflow-hidden">
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">calendar_month</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Tổng hồ sơ (Tháng)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">45</span>
                        <span class="text-blue-500 text-xs font-bold mb-1.5 ml-1 flex items-center">+12%</span>
                    </div>
                </div>
            </div>
            
            <!-- Thẻ 3 -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-emerald-300 transition-all cursor-pointer relative overflow-hidden">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">task_alt</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Đã xuất bản (Hôm nay)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">08</span>
                        <span class="text-emerald-500 text-xs font-bold mb-1.5 ml-1">Hoàn tất</span>
                    </div>
                </div>
            </div>

            <!-- Thẻ 4 -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-amber-300 transition-all cursor-pointer relative overflow-hidden">
                <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">draft</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Nháp (Chưa xuất bản)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">12</span>
                        <span class="text-amber-500 text-xs font-bold mb-1.5 ml-1">Chờ xử lý</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- LAYOUT GRID CHÍNH -->
        <div class="grid grid-cols-1 xl:grid-cols-5 gap-6 items-start relative z-10 pb-10">
            
            <!-- Phần Bảng (Chiếm 3/5) -->
            <div class="xl:col-span-3 bg-white rounded-3xl border border-slate-200 shadow-sm flex flex-col w-full">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between sm:items-center gap-4 bg-white rounded-t-3xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <span class="material-symbols-outlined">folder_open</span>
                        </div>
                        <h2 class="font-bold text-xl text-slate-900 tracking-tight">Danh Sách Hồ Sơ</h2>
                    </div>
                    <div class="relative w-full sm:w-auto shrink-0">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                        <input type="text" placeholder="Tìm mã, tên KH..." class="pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 w-full sm:w-64">
                    </div>
                </div>
                
                <div class="w-full overflow-x-auto xl:overflow-visible pb-2">
                    <table class="w-full text-left border-collapse min-w-[900px]">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200">
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Loại Hồ Sơ</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Bên A</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Bên B</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[10%]">Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Dòng 1 -->
                            <tr class="hover:bg-blue-50/40 transition-colors">
                                <td class="p-4 align-top">
                                    <span class="font-bold text-slate-900 text-[13px] block">Hợp đồng mua bán xe máy</span>
                                    <span class="text-[11px] text-slate-400 font-mono">HS-2026-001</span>
                                </td>
                                <td class="p-4 align-top">
                                    <span class="font-bold text-blue-900 text-[13px] uppercase block">Nguyễn Văn A</span>
                                    <span class="text-[11px] text-slate-500">CCCD: 079090123456</span>
                                </td>
                                <td class="p-4 align-top">
                                    <span class="font-bold text-slate-800 text-[13px] uppercase block">Trần Thị B</span>
                                    <span class="text-[11px] text-slate-500">CCCD: 012345678912</span>
                                </td>
                                <td class="p-4 align-top pt-5">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 rounded-full font-bold text-[10px] uppercase border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Nháp
                                    </span>
                                </td>
                            </tr>
                            <!-- Dòng 2 -->
                            <tr class="hover:bg-blue-50/40 transition-colors">
                                <td class="p-4 align-top">
                                    <span class="font-bold text-slate-900 text-[13px] block">Ủy quyền sử dụng đất</span>
                                    <span class="text-[11px] text-slate-400 font-mono">HS-2026-002</span>
                                </td>
                                <td class="p-4 align-top">
                                    <span class="font-bold text-blue-900 text-[13px] uppercase block">Lê Văn C</span>
                                    <span class="text-[11px] text-slate-500">CCCD: 045090987654</span>
                                </td>
                                <td class="p-4 align-top">
                                    <span class="font-bold text-slate-800 text-[13px] uppercase block">Phạm Thị D</span>
                                    <span class="text-[11px] text-slate-500">CCCD: 036080112233</span>
                                </td>
                                <td class="p-4 align-top pt-5">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-bold text-[10px] uppercase border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Đã XB
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Phần Biểu đồ (Chiếm 2/5) -->
            <div class="xl:col-span-2 bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sticky top-0 w-full">
                <h2 class="font-bold text-xl text-slate-900 tracking-tight flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-purple-600">pie_chart</span> Thống Kê
                </h2>
                
                <div class="space-y-6 mt-6">
                    <div>
                        <div class="flex justify-between items-center text-[13px] font-bold text-slate-700 mb-2.5">
                            <span>Hợp đồng ủy quyền</span>
                            <span class="text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md">70%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center text-[13px] font-bold text-slate-700 mb-2.5">
                            <span>Mua bán xe máy</span>
                            <span class="text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">20%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3">
                            <div class="bg-emerald-400 h-3 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection