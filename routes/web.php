<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XacThucController;

// 1. Truy cập đầu tiên sẽ trỏ thẳng vào trang Đăng nhập
Route::get('/', function () { return view('dang-nhap'); })->name('login');

// Thêm 2 route xử lý Đăng nhập & Đăng xuất
Route::post('/xu-ly-dang-nhap', [XacThucController::class, 'xuLyDangNhap'])->name('login.post');
Route::post('/dang-xuat', [XacThucController::class, 'dangXuat'])->name('logout');

// 2. Các route khác của hệ thống
Route::get('/trang-chu', function () { return view('trang-chu'); })->name('dashboard');
Route::get('/soan-ho-so', function () { return view('soan-ho-so'); })->name('hoso.soan');
Route::get('/mau-in', function () { return view('mau-in'); })->name('template');
Route::get('/ke-khai-ho-so', function () { return view('ke-khai-ho-so'); })->name('kekhaihoso');
Route::get('/van-phong-pham', function () { return view('van-phong-pham'); })->name('vpp');
Route::get('/tra-cuu-ngan-chan', function () { return view('tra-cuu-ngan-chan'); })->name('tracuu');

// 3. Nhóm quản trị (Admin)
Route::get('/quan-ly-tai-khoan', function () { return view('quan-ly-tai-khoan'); })->name('users.index');
Route::get('/cai-dat-he-thong', function () { return view('cai-dat-he-thong'); })->name('settings');
Route::get('/tai-khoan', function () { return view('tai-khoan'); })->name('profile');