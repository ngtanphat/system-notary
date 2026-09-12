<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Hệ thống Quản lý Công chứng')</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Courier+Prime&family=Source+Serif+4:wght@400;700&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#0f172a",
                        "surface": "#f8fafc",
                        "on-surface": "#1e293b",
                        "on-surface-variant": "#475569",
                        "ntm-blue": "#004e89",
                        "ntm-gold": "#cf9c3f",
                        "ntm-dark": "#0a2540"
                    },
                    fontFamily: {
                        "body-md": ["Inter", "sans-serif"],
                        "mono-data": ["Courier Prime", "monospace"],
                        "doc-body": ["'Source Serif 4'", "serif"],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<?php

use Illuminate\Support\Facades\Auth;

if (!Auth::check()) {
    return view('dang-nhap.blade.php');
} else {
    echo 'Login Success';
}
?>

<body class="bg-[#f4f7fb] text-on-surface font-body-md min-h-screen flex flex-col overflow-hidden selection:bg-blue-200"
    x-data="{ mobileMenuOpen: false, toastMessage: '', showToast: false }"
    @notify.window="toastMessage = $event.detail; showToast = true; setTimeout(() => showToast = false, 3000)">

    <!-- Top Navigation -->
    <nav class="sticky top-0 z-[100] flex items-center justify-between px-4 sm:px-6 h-16 w-full bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm shrink-0">

        <!-- Logo & Nút Mobile -->
        <div class="flex items-center gap-3 h-full">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="xl:hidden p-1.5 text-slate-600 rounded-lg hover:bg-slate-100 transition-colors focus:outline-none">
                <span class="material-symbols-outlined text-[26px]">menu</span>
            </button>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 shrink-0 group">
                <img src="{{ asset('img/logo-NTM.png') }}" alt="Logo NTM" class="h-8 sm:h-9 w-auto object-contain group-hover:scale-105 transition-transform duration-200" onerror="this.style.display='none'">
                <div class="w-px h-8 bg-slate-300 hidden sm:block"></div>
                <div class="hidden sm:flex flex-col justify-center">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Văn Phòng Công Chứng</span>
                    <span class="font-black text-ntm-blue uppercase tracking-tight text-[15px] leading-none">Nguyễn Thành Mỹ</span>
                </div>
            </a>
        </div>

        @php
        $navItems = [
        ['route' => 'dashboard', 'label' => 'Trang Chủ'],
        ['route' => 'hoso.soan', 'label' => 'Soạn Hồ Sơ'],
        ['route' => 'template', 'label' => 'Mẫu In'],
        ['route' => 'kekhaihoso', 'label' => 'Kê Khai Hồ Sơ'],
        ['route' => 'vpp', 'label' => 'Quản Lý VPP'],
        ['route' => 'tracuu', 'label' => 'Tra Cứu', 'is_red' => true],
        ];
        @endphp

        <!-- Menu Ngang (Desktop) -->
        <div class="hidden xl:flex gap-1 lg:gap-3 items-end h-full pt-3 flex-1 justify-center">
            @foreach($navItems as $item)
            @php
            $isActive = request()->routeIs($item['route']);
            $colorClass = isset($item['is_red']) ? 'red' : 'blue';
            @endphp
            <a href="{{ route($item['route']) }}"
                class="{{ $isActive ? 'text-'.$colorClass.'-700 font-bold border-b-[3px] border-'.$colorClass.'-600 bg-'.$colorClass.'-50/50' : 'text-slate-500 hover:text-'.$colorClass.'-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' }} transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">
                {{ $item['label'] }}
            </a>
            @endforeach

            <!-- Admin Dropdown -->
            @php
            $isAdminActive = request()->routeIs('users.index') || request()->routeIs('settings');
            @endphp
            @if(auth()->check() && auth()->user()->vai_tro_id == 1)
            <div class="relative h-full flex items-end" x-data="{ adminMenu: false }" @click.outside="adminMenu = false">
                <button @click="adminMenu = !adminMenu"
                    class="{{ $isAdminActive ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' }} transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap flex items-center gap-1 cursor-pointer focus:outline-none">
                    Quản Lý <span class="material-symbols-outlined text-[18px]">expand_more</span>
                </button>
                <div x-show="adminMenu" x-transition style="display: none;" class="absolute left-0 top-full mt-0 w-48 bg-white rounded-b-xl rounded-tr-xl shadow-xl border border-slate-200 z-50 overflow-hidden">
                    <a href="{{ route('users.index') }}" class="px-4 py-2.5 text-[13px] font-semibold {{ request()->routeIs('users.index') ? 'text-blue-700 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }} flex items-center gap-3 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">group</span> Quản lý tài khoản
                    </a>
                    <a href="{{ route('settings') }}" class="px-4 py-2.5 text-[13px] font-semibold {{ request()->routeIs('settings') ? 'text-blue-700 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }} flex items-center gap-3 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">settings</span> Cài đặt hệ thống
                    </a>
                </div>
            </div>
            @endif
        </div>

        <!-- User Avatar Dropdown -->
        <div class="flex items-center gap-4 shrink-0 relative z-50" x-data="{ userMenu: false }" @click.outside="userMenu = false">
            <button @click="userMenu = !userMenu" class="flex items-center gap-1.5 p-1 rounded-full hover:bg-slate-100 transition-colors focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-ntm-blue to-ntm-dark text-white flex items-center justify-center font-bold text-[13px]">A</div>
                <span class="material-symbols-outlined text-slate-400 text-[18px]">expand_more</span>
            </button>
            <div x-show="userMenu" x-transition style="display: none;" class="absolute right-0 top-12 mt-1 w-56 bg-white rounded-xl shadow-xl border border-slate-200 z-50 overflow-hidden">
                <div class="px-4 py-3 border-b border-slate-100 bg-slate-50/50">
                    <p class="text-[13px] font-bold text-slate-900 truncate">{{auth()->user()->ho_ten}}</p>
                    <p class="text-[11px] font-bold text-blue-600 uppercase mt-0.5">{{auth()->user()->ten_vai_tro}}</p>
                </div>
                <a href="{{ route('profile') }}" class="px-4 py-2.5 text-[13px] font-medium text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-2.5 transition-colors">
                    <span class="material-symbols-outlined text-[18px] text-slate-400">manage_accounts</span> Hồ sơ cá nhân
                </a>
            </div>
        </div>
    </nav>

    <!-- Menu Mobile -->
    <div x-show="mobileMenuOpen" style="display: none;" class="absolute top-16 left-0 w-full bg-white border-b border-slate-200 shadow-xl z-40 xl:hidden max-h-[calc(100vh-64px)] overflow-y-auto" x-transition>
        <div class="flex flex-col p-4 space-y-1">
            @foreach($navItems as $item)
            @php
            $isActive = request()->routeIs($item['route']);
            $colorClass = isset($item['is_red']) ? 'red' : 'blue';
            @endphp
            <a href="{{ route($item['route']) }}" class="px-4 py-3 rounded-xl text-[15px] font-semibold {{ $isActive ? 'bg-'.$colorClass.'-50 text-'.$colorClass.'-700' : 'text-slate-600 active:bg-slate-50' }}">
                {{ $item['label'] }}
            </a>
            @endforeach

            <div class="h-px bg-slate-200 my-2"></div>
            <p class="px-4 py-1 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Dành cho Admin</p>
            <a href="{{ route('users.index') }}" class="px-4 py-3 rounded-xl text-[15px] font-semibold {{ request()->routeIs('users.index') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 active:bg-slate-50' }}">Quản lý tài khoản</a>
            <a href="{{ route('settings') }}" class="px-4 py-3 rounded-xl text-[15px] font-semibold {{ request()->routeIs('settings') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 active:bg-slate-50' }}">Cài đặt hệ thống</a>
        </div>
    </div>

    <!-- Main Workspace -->
    <main class="flex-1 relative overflow-hidden flex flex-col bg-transparent" @click="mobileMenuOpen = false">
        @yield('content')
    </main>

    <!-- Toast Component -->
    <div class="fixed bottom-4 right-4 z-[9999] flex flex-col gap-2 pointer-events-none">
        <div x-show="showToast" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0" style="display: none;"
            class="bg-ntm-dark text-white px-5 py-3 rounded-xl shadow-2xl font-medium text-[13px] flex items-center gap-3 border border-slate-700 pointer-events-auto">
            <span class="material-symbols-outlined text-emerald-400">check_circle</span>
            <span x-text="toastMessage"></span>
        </div>
    </div>

    @stack('scripts')
</body>

</html>