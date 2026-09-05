@extends('layouts.app')
@section('title', 'Quản Lý Mẫu In')

@section('content')
<div class="h-[calc(100vh-64px)] flex w-full overflow-hidden bg-[#eaf1ff] animate-fade-in" x-data="{ editor: null }">

    <!-- Cột Trái: Danh sách Biến -->
    <section class="w-full md:w-[25%] bg-white border-r border-slate-300 flex flex-col h-full z-10 shadow-lg">
        <header class="px-6 py-4 border-b border-slate-200 bg-white sticky top-0 z-20">
            <h2 class="text-[20px] font-semibold text-slate-900 flex items-center gap-2">
                <span class="material-symbols-outlined text-purple-600 bg-purple-50 p-1.5 rounded-lg">data_object</span> Biến Hệ Thống
            </h2>
        </header>

        <div class="flex-1 overflow-y-auto px-6 py-4 custom-scrollbar space-y-3 bg-[#f8f9ff]">
            <p class="text-[12px] font-bold text-slate-500 mb-2 uppercase tracking-wider">Bên A</p>
            <button @click="navigator.clipboard.writeText('<<Ten_Dt_A1>>'); $dispatch('notify', 'Đã copy biến <<Ten_Dt_A1>>')" class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 flex justify-between items-center">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Ten_Dt_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300">content_copy</span>
            </button>
            <button @click="navigator.clipboard.writeText('<<CCCD_A1>>'); $dispatch('notify', 'Đã copy biến <<CCCD_A1>>')" class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 flex justify-between items-center">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;CCCD_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300">content_copy</span>
            </button>

            <p class="text-[12px] font-bold text-slate-500 mb-2 mt-6 uppercase tracking-wider">Tài Sản</p>
            <button @click="navigator.clipboard.writeText('<<Bien_So>>'); $dispatch('notify', 'Đã copy biến <<Bien_So>>')" class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 flex justify-between items-center">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Bien_So&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300">content_copy</span>
            </button>
        </div>
    </section>

    <!-- Cột Phải: Trình Soạn Thảo -->
    <section class="flex-1 overflow-y-auto relative flex flex-col items-center py-10 custom-scrollbar bg-gray-200">
        
        <div class="fixed top-[88px] bg-white border border-slate-200 rounded-xl shadow-md px-4 py-2 flex items-center gap-4 z-30 transform -translate-x-1/2 left-[62%]">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-lg text-[13px] font-semibold flex items-center gap-1" @click="$dispatch('notify', 'Lưu mẫu in thành công!')">
                <span class="material-symbols-outlined text-[16px]">save</span> Lưu Mẫu
            </button>
        </div>

        <article class="a4-page relative flex flex-col font-doc-body text-[16px] leading-[24px] text-slate-900 ring-1 ring-slate-200 outline-none" contenteditable="true">
            <div class="text-center mb-6 mt-12">
                <h1 class="font-bold text-[28px] uppercase tracking-wider mb-2">MẪU HỢP ĐỒNG ỦY QUYỀN</h1>
            </div>
            <div class="space-y-6 flex-1 text-justify">
                <p>Chúng tôi gồm có:</p>
                <div class="space-y-2">
                    <h4 class="font-bold uppercase text-[15px] mb-2">BÊN ỦY QUYỀN (BÊN A)</h4>
                    <p>Ông/Bà: <span class="bg-amber-100 px-1 rounded font-bold uppercase">&lt;&lt;Ten_Dt_A1&gt;&gt;</span></p>
                    <p>CCCD: <span class="bg-amber-100 px-1 rounded">&lt;&lt;CCCD_A1&gt;&gt;</span></p>
                </div>
            </div>
        </article>
    </section>
</div>
@endsection