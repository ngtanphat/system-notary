<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Các route tĩnh phục vụ cho giai đoạn thiết kế giao diện
Route::get('/', function () { return view('trang-chu'); })->name('dashboard');
Route::get('/soan-ho-so', function () { return view('soan-ho-so'); })->name('hoso.soan');
Route::get('/mau-in', function () { return view('mau-in'); })->name('template');
Route::get('/ke-khai-ho-so', function () { return view('ke-khai-ho-so'); })->name('kekhaihoso');
Route::get('/van-phong-pham', function () { return view('van-phong-pham'); })->name('vpp');
Route::get('/tra-cuu-ngan-chan', function () { return view('tra-cuu-ngan-chan'); })->name('tracuu');

// Nhóm quản trị (Admin)
Route::get('/quan-ly-tai-khoan', function () { return view('quan-ly-tai-khoan'); })->name('users.index');
Route::get('/cai-dat-he-thong', function () { return view('cai-dat-he-thong'); })->name('settings');
Route::get('/tai-khoan', function () { return view('tai-khoan'); })->name('profile');