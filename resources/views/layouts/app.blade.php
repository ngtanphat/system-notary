<!DOCTYPE html>
<html class="light" lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Hệ thống Quản lý Công chứng') - NotaryOS</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Courier+Prime&family=Source+Serif+4:wght@400;700&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com/3.4.4?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#0f172a", "surface": "#f8fafc",
                        "on-surface": "#1e293b", "on-surface-variant": "#475569",
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
    
    <!-- CSS Core -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Alpine.js (CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<!-- Khai báo Alpine.js state dùng chung (Menu, Toast) -->
<body class="bg-[#f4f7fb] text-on-surface font-body-md min-h-screen flex flex-col overflow-hidden selection:bg-blue-200" 
      x-data="{ mobileMenuOpen: false, toastMessage: '', showToast: false }" 
      @notify.window="toastMessage = $event.detail; showToast = true; setTimeout(() => showToast = false, 3000)">
    
    <!-- Top Navigation -->
    <nav class="sticky top-0 z-[100] flex items-center justify-between px-4 sm:px-6 h-16 w-full bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm shrink-0">
        <!-- Logo & Nút Mobile -->
        <div class="flex items-center gap-3 h-full">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="xl:hidden p-1.5 text-slate-600 rounded-lg hover:bg-slate-100 transition-colors">
                <span class="material-symbols-outlined text-[26px]">menu</span>
            </button>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 shrink-0 group">
                <img src="{{ asset('img/logo-NTM.png') }}" alt="Logo NTM" class="h-8 sm:h-9 w-auto object-contain group-hover:scale-105 transition-transform duration-200" onerror="this.style.display='none'">
                <div class="w-px h-8 bg-slate-300 hidden sm:block"></div>
                <div class="hidden sm:flex flex-col justify-center">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Văn Phòng Công Chứng</span>
                    <span class="font-black text-blue-900 uppercase tracking-tight text-[15px] leading-none">Nguyễn Thành Mỹ</span>
                </div>
            </a>
        </div>
        
        <!-- Menu Ngang -->
        <div class="hidden xl:flex gap-1 lg:gap-3 items-end h-full pt-3 flex-1 justify-center">
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

            <!-- Admin Dropdown (Alpine) -->
            <div class="relative h-full flex items-end" x-data="{ adminMenu: false }" @click.outside="adminMenu = false">
                <button @click="adminMenu = !adminMenu" class="text-slate-500 hover:text-blue-900 transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap flex items-center gap-1 cursor-pointer">
                    Quản Lý <span class="material-symbols-outlined text-[18px]">expand_more</span>
                </button>
                <div x-show="adminMenu" x-transition style="display: none;" class="absolute left-0 top-[60px] w-48 bg-white rounded-b-xl rounded-tr-xl shadow-xl border border-slate-200 z-50">
                    <a href="{{ route('users.index') }}" class="px-4 py-2.5 text-[13px] font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-3">
                        <span class="material-symbols-outlined text-[18px]">group</span> Quản lý tài khoản
                    </a>
                    <a href="{{ route('settings') }}" class="px-4 py-2.5 text-[13px] font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-3">
                        <span class="material-symbols-outlined text-[18px]">settings</span> Cài đặt hệ thống
                    </a>
                </div>
            </div>
        </div>
        
        <!-- User Avatar Dropdown (Alpine) -->
        <div class="flex items-center gap-4 shrink-0 relative z-50" x-data="{ userMenu: false }" @click.outside="userMenu = false">
            <button @click="userMenu = !userMenu" class="flex items-center gap-1.5 p-1 rounded-full hover:bg-slate-100 transition-colors focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-700 to-blue-900 text-white flex items-center justify-center font-bold text-[13px]">A</div>
                <span class="material-symbols-outlined text-slate-400 text-[18px]">expand_more</span>
            </button>
            <div x-show="userMenu" x-transition style="display: none;" class="absolute right-0 top-12 mt-1 w-56 bg-white rounded-xl shadow-xl border border-slate-200 z-50">
                <div class="px-4 py-3 border-b border-slate-100 bg-slate-50/50">
                    <p class="text-[13px] font-bold text-slate-900 truncate">Nguyễn Thành Mỹ</p>
                    <p class="text-[11px] font-bold text-blue-600 uppercase mt-0.5">Quản Trị Viên</p>
                </div>
                <a href="{{ route('profile') }}" class="px-4 py-2.5 text-[13px] font-medium text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-[18px] text-slate-400">manage_accounts</span> Hồ sơ cá nhân
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="flex-1 relative overflow-hidden flex flex-col bg-transparent">
        @yield('content')
    </main>

    <!-- Toast Component -->
    <div class="fixed bottom-4 right-4 z-[9999] flex flex-col gap-2 pointer-events-none">
        <div x-show="showToast" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0" style="display: none;"
             class="bg-slate-900 text-white px-5 py-3 rounded-xl shadow-2xl font-medium text-[13px] flex items-center gap-3 border border-slate-700 pointer-events-auto">
            <span class="material-symbols-outlined text-emerald-400">check_circle</span>
            <span x-text="toastMessage"></span>
        </div>
    </div>

    @yield('scripts')
</body>
</html>