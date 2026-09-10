<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập - Hệ thống Quản trị NTM</title>

    <!-- Fonts & Icons (Google Fonts) -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Thư viện nội bộ (Hoạt động 100% Offline) -->
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>

    <!-- Cấu hình hệ màu nhận diện thương hiệu NTM -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ntm-blue': '#004e89',
                        'ntm-gold': '#cf9c3f',
                        'ntm-dark': '#0a2540'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-ntm-blue font-['Inter'] min-h-screen flex items-center justify-center p-4 selection:bg-slate-200">

    <!-- Khung form chính -->
    <div class="bg-white rounded-[16px] shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 w-full max-w-[400px] p-8 sm:p-10 relative z-10 animate-fade-in">

        <!-- Logo & Tiêu đề -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-6 transition-transform duration-500 hover:scale-105">
                <img src="{{ asset('img/logo-NTM.png') }}" alt="Logo NTM" class="h-20 object-contain">
            </div>
            <h1 class="text-[18px] font-bold text-slate-800 uppercase tracking-wide">Hệ Thống Quản Trị</h1>
            <p class="text-slate-500 text-[12px] mt-1.5 font-medium">Vui lòng đăng nhập để tiếp tục</p>
        </div>

        <!-- Form xử lý logic giao diện bằng Alpine.js -->
        <!-- <form action="#" method="POST" class="w-full space-y-5" x-data="{ isLoading: false }" @submit="isLoading = true"> -->
        <form action="{{ route('login.post') }}" method="POST" class="w-full space-y-5" x-data="{ isLoading: false }" @submit="isLoading = true">
            @csrf
            @error('loi_dang_nhap')
                <div class="p-3 bg-red-50 border border-red-200 text-red-600 text-[13px] font-semibold rounded-lg flex items-center gap-2 animate-fade-in">
                    <span class="material-symbols-outlined text-[18px]">error</span>
                    {{ $message }}
                </div>
            @enderror
            <!-- Ô Tên đăng nhập -->
            <div class="space-y-1.5">
                <label class="text-[13px] font-semibold text-slate-700 block">Tên đăng nhập</label>
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-ntm-blue transition-colors duration-300 text-[20px]">person</span>
                    <input type="text" name="ten_dang_nhap"
                        class="w-full bg-white border border-slate-300 rounded-lg pl-10 pr-4 py-2.5 text-[14px] text-slate-800 font-medium hover:border-slate-400 focus:outline-none focus:border-ntm-blue focus:ring-2 focus:ring-ntm-blue/20 transition-all duration-300"
                        placeholder="Nhập tài khoản" required autocomplete="off">
                </div>
            </div>

            <!-- Ô Mật khẩu -->
            <div class="space-y-1.5">
                <label class="text-[13px] font-semibold text-slate-700 block">Mật khẩu</label>
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-ntm-blue transition-colors duration-300 text-[20px]">lock</span>
                    <input type="password" name="mat_khau"
                        class="w-full bg-white border border-slate-300 rounded-lg pl-10 pr-4 py-2.5 text-[14px] text-slate-800 font-medium hover:border-slate-400 focus:outline-none focus:border-ntm-blue focus:ring-2 focus:ring-ntm-blue/20 transition-all duration-300"
                        placeholder="Nhập mật khẩu" required>
                </div>
            </div>

            <!-- Nút Đăng nhập có hiệu ứng Spin -->
            <button type="submit"
                :disabled="isLoading"
                class="w-full h-[46px] bg-ntm-dark text-white rounded-lg font-semibold text-[13px] hover:bg-slate-800 hover:shadow-lg transition-all duration-300 active:scale-95 flex items-center justify-center uppercase tracking-wide group disabled:opacity-75 disabled:cursor-not-allowed mt-4">

                <!-- Hiển thị mặc định -->
                <span x-show="!isLoading" class="flex items-center gap-2">
                    Đăng Nhập
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform duration-300">arrow_right_alt</span>
                </span>

                <!-- Hiển thị khi đang xử lý (Bị ẩn ban đầu) -->
                <span x-show="isLoading" style="display: none;" class="flex items-center justify-center">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
            </button>
        </form>

        <!-- Footer Chữ ký bản quyền -->
        <div class="mt-8 pt-5 border-t border-slate-100 flex flex-col items-center justify-center gap-1.5 relative group cursor-default">
            <p class="text-[12px] text-slate-400 font-medium flex items-center gap-1.5 transition-colors group-hover:text-slate-500">
                <span class="material-symbols-outlined text-[14px]">code</span>
                Thiết kế & Phát triển bởi <span class="text-slate-700 font-bold">Phát</span>
            </p>
            <div class="flex items-center gap-2 mt-0.5 opacity-80 group-hover:opacity-100 transition-opacity">
                <span class="w-1 h-1 rounded-full bg-ntm-gold"></span>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-ntm-gold">NTP Solution</span>
                <span class="w-1 h-1 rounded-full bg-ntm-gold"></span>
            </div>
        </div>

    </div>

    <!-- Khai báo CSS Animations -->
    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>

</html>