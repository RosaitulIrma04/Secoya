<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PembeliController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/penjual', function () {
    return view('penjual');
});


// Arah untuk login
Route::get('/login', function() { return view('auth.login'); })->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Arah untuk register
Route::post('/register', [RegisterController::class, 'register']);

// Arah untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Arah untuk view chart (lihat keranjang)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Arah untuk add to wishlist
Route::post('/wishlist/add', [\App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add');

// Arah untuk ke dashboard pembeli
Route::get('/dashboard-pembeli', [App\Http\Controllers\PembeliController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard.pembeli');

// Arah untuk mengatur dashboard pembeli
Route::get('/pembeli', [App\Http\Controllers\PembeliController::class, 'index'])->name('pembeli.index');

// Melihat akun pembeli
Route::get('/profile', function () {
    return view('pembeli.profile', [
        'user' => Auth::user()
    ]);
})->name('profile.show')->middleware('auth');

// Tambahkan di routes/web.php
Route::post('/profile/update', [App\Http\Controllers\PembeliController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

//Arah untuk your wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth')->name('wishlist.index');