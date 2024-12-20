<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TransaksiController;

// Home Route
Route::get('/', [HomeController::class, 'index']);

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Siswa Routes
    Route::get('siswa/archived', [SiswaController::class, 'archived'])->name('siswa.archived');
    Route::post('siswa/{id}/restore', [SiswaController::class, 'restore'])->name('siswa.restore');
    Route::resource('siswa', SiswaController::class)->except(['destroy']);
    Route::delete('siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Voucher Routes
    Route::resource('vouchers', VoucherController::class);
    Route::post('vouchers/{voucher}/reset', [VoucherController::class, 'reset'])->name('vouchers.reset');
    Route::post('vouchers/reset-all', [VoucherController::class, 'resetAll'])->name('vouchers.reset.all');

    // User Routes
    Route::resource('users', UserController::class);

    // Transaksi Routes for Admin
    Route::get('transaksi', [TransaksiController::class, 'indexAdmin'])->name('transaksi.index');
    Route::get('transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});

// Toko Routes
Route::middleware(['auth', 'role:toko'])->prefix('toko')->name('toko.')->group(function () {
    Route::get('/dashboard', [TokoController::class, 'index'])->name('dashboard');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/{siswa}/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
});

// Authentication Routes
require __DIR__.'/auth.php';

// Default Web Routes
Route::view('/', 'welcome');
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

Route::post('/admin/transaksi/reset', [TransaksiController::class, 'reset'])->name('admin.transaksi.reset');