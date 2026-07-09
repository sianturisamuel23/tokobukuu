<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// =======================
// Admin Controller
// =======================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\PesananController;

// =======================
// User Controller
// =======================
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PesananController as UserPesananController;

// =====================================================
// PUBLIC
// =====================================================

Route::get('/', [HomeController::class, 'index'])->name('home');

// =====================================================
// CUSTOMER
// =====================================================

Route::middleware('auth')->group(function () {

    // =======================
    // Keranjang
    // =======================
    Route::get('/keranjang', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/cart/update/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    // =======================
    // Checkout
    // =======================
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    // =======================
    // Riwayat Pesanan Customer
    // =======================
    Route::get('/pesanan', [UserPesananController::class, 'index'])
        ->name('user.pesanan.index');

    Route::get('/pesanan/{id}', [UserPesananController::class, 'show'])
        ->name('user.pesanan.show');

    // =======================
    // Profile
    // =======================
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// =====================================================
// ADMIN
// =====================================================

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('kategori', KategoriController::class);

    Route::resource('buku', BukuController::class);

    // Kelola Pesanan Admin
    Route::get('/admin/pesanan', [PesananController::class, 'index'])
        ->name('pesanan.index');

    Route::get('/admin/pesanan/{id}', [PesananController::class, 'show'])
        ->name('pesanan.show');

    Route::put('/admin/pesanan/{id}', [PesananController::class, 'update'])
        ->name('pesanan.update');
});

require __DIR__.'/auth.php';