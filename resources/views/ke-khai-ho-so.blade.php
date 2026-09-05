@extends('layouts.app')
@section('title', 'Kê Khai Hồ Sơ')

@section('content')
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff]" x-data="{ modalOpen: false }">
    <div class="w-full flex flex-col gap-6 sm:gap-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Kê Khai Hồ Sơ</h1>
            </div>
        </div>

        <!-- Bảng Dữ Liệu -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
            <div class="w-full overflow-x-auto custom-scrollbar pb-2">
                <table class="w-full text-left border-collapse min-w-[1100px]">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200">
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Số CC</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Tên Hồ Sơ</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Điểm</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-blue-50/40 transition-colors">
                            <td class="p-4 text-[13px] font-mono font-bold text-blue-700">HS-2026-001</td>
                            <td class="p-4">
                                <div class="font-bold text-slate-900 text-[13px]">Hợp đồng mua bán xe máy</div>
                                <div class="text-[11px] text-slate-500 mt-1">NV: Nguyễn Văn A | CCV: Nguyễn Thành Mỹ</div>
                            </td>
                            <td class="p-4 text-center">
                                <span class="bg-blue-100 text-blue-800 font-bold px-3 py-1 rounded-lg text-[12px]">1.50</span>
                            </td>
                            <td class="p-4 text-center">
                                <button @click="modalOpen = true" class="p-2 hover:bg-slate-200 rounded-xl text-blue-600 transition-all font-bold text-[13px] border border-slate-200 shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">edit_document</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Chấm Điểm (Quản lý bằng Alpine.js) -->
    <div x-show="modalOpen" style="display: none;" class="fixed inset-0 z-[100] bg-slate-900/60 flex items-center justify-center backdrop-blur-sm" x-transition.opacity>
        <div @click.outside="modalOpen = false" class="bg-white rounded-3xl w-[95vw] lg:w-[1200px] h-[90vh] flex flex-col shadow-2xl" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50 rounded-t-3xl">
                <h3 class="text-lg font-bold text-slate-900">Đánh giá hồ sơ: <span class="text-blue-600 font-mono">HS-2026-001</span></h3>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-red-500"><span class="material-symbols-outlined text-3xl">close</span></button>
            </div>
            <!-- Modal Body -->
            <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">
                <div class="w-full lg:w-[70%] border-r border-slate-200 bg-[#f8f9ff] p-6 text-[14px]">
                    <p><strong class="text-slate-900">Tên hồ sơ:</strong> Hợp đồng mua bán xe máy</p>
                    <p><strong class="text-slate-900">Thư ký:</strong> Nguyễn Văn A</p>
                </div>
                <div class="w-full lg:w-[30%] p-6 bg-white space-y-6">
                    <div>
                        <label class="block text-[13px] font-bold text-slate-700 mb-2">1. Thư ký đề xuất điểm:</label>
                        <input type="number" class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 outline-none focus:border-blue-500" value="1.5">
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t bg-slate-50 flex justify-end gap-3 rounded-b-3xl">
                <button @click="modalOpen = false" class="px-5 py-2.5 rounded-xl border">Đóng</button>
                <button @click="modalOpen = false; $dispatch('notify', 'Lưu điểm thành công!')" class="px-6 py-2.5 rounded-xl text-white bg-blue-600">Lưu Đánh Giá</button>
            </div>
        </div>
    </div>
</div>
@endsection