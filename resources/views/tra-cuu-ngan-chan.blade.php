@extends('layouts.app')
@section('title', 'Tra Cứu Ngăn Chặn')

@section('content')
<div class="p-4 sm:p-6 overflow-hidden w-full h-[calc(100vh-64px)] bg-[#eaf1ff] flex flex-col gap-4 sm:gap-6 animate-fade-in">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 shrink-0">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                <span class="material-symbols-outlined text-red-600 bg-red-100 p-2 rounded-xl text-3xl">policy</span>
                Tra Cứu Ngăn Chặn
            </h1>
            <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium hidden sm:block">
                Hệ thống tra cứu dữ liệu ngăn chặn (Nguồn: Sở Tư Pháp TP.HCM).
            </p>
        </div>
    </div>

    <!-- Khung iFrame nhúng trực tiếp tràn viền -->
    <div class="flex-1 bg-white rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden flex flex-col">
        <div class="flex-1 w-full bg-slate-50 relative">
            <iframe
                src="http://210.245.111.1/dsnc/Default.aspx"
                class="absolute inset-0 w-full h-full border-none"
                title="Hệ thống tra cứu ngăn chặn Sở Tư Pháp"
                allowfullscreen>
            </iframe>
        </div>
    </div>

</div>
@endsection