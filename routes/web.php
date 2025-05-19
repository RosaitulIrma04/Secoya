<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/penjual', function () {
    return view('penjual');
});

Route::get('/pembeli', function () {
    return view('pembeli');
});

// Arah untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Arah untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Arah untuk view chart (lihat keranjang)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
