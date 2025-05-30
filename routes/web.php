<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/penjual', function () {
    return view('penjual');
});

// Route login admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

//Route untuk login pembeli dan penjual
Route::get('/login/pembeli', [AuthController::class, 'showLoginPembeli'])->name('login.pembeli');
Route::get('/login/penjual', [AuthController::class, 'showLoginPenjual'])->name('login.penjual');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth:admin')->name('admin.dashboard');

// Arah untuk login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
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
Route::get('/halaman-sindiran', [CartController::class, 'showOnWelcome'])->name('sindiran');
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
        'user' => Auth::user(),
    ]);
})
    ->name('profile.show')
    ->middleware('auth');

// Tambahkan di routes/web.php
Route::post('/profile/update', [App\Http\Controllers\PembeliController::class, 'updateProfile'])
    ->name('profile.update')
    ->middleware('auth');

//Arah untuk your wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])
    ->middleware('auth')
    ->name('wishlist.index');

Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth')->name('wishlist.index');

Route::middleware(['auth', CheckRole::class . ':pembeli']);

Route::middleware(['auth', CheckRole::class . ':pembeli'])->group(function () {
    Route::get('/my-account', [ProfileController::class, 'show'])->name('myaccount');
    Route::get('/my-account/edit', [ProfileController::class, 'edit'])->name('myaccount.edit');
    Route::post('/my-account/update', [ProfileController::class, 'update'])->name('myaccount.update');


// Route untuk form register pembeli
Route::get('/register/pembeli', [AuthController::class, 'showRegisterForm'])->name('register.pembeli');

// Route untuk mengirim data register pembeli
Route::post('/register/pembeli', [AuthController::class, 'register'])->name('register.pembeli.post');

});
