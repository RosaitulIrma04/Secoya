<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth:admin')->name('admin.dashboard');

// Route untuk Kelola Produk oleh Admin
Route::get('/admin/products', [AdminProductController::class, 'index'])
    ->middleware('auth:admin')
    ->name('admin.products.index');

Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('admin.products.destroy');

//Route untuk login pembeli dan penjual
Route::get('/login/pembeli', [AuthController::class, 'showLoginPembeli'])->name('login.pembeli');
Route::get('/login/penjual', [AuthController::class, 'showLoginPenjual'])->name('login.penjual');

// Arah untuk login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

// penjual
Route::get('/dashboard-penjual', [PenjualController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard.penjual');
    Route::get('/dashboard/penjual', [PenjualController::class, 'index'])->name('dashboard.penjual');

// Tampilkan form register penjual
Route::get('/register/penjual', [PenjualController::class, 'showRegistrationForm'])->name('register.penjual');
// Proses submit form register penjual
Route::post('/register/penjual', [PenjualController::class, 'register'])->name('register.penjual.submit');
// Form login penjual
Route::get('/login/penjual', [PenjualController::class, 'showLoginForm'])->name('login.penjual');
// Proses login penjual
Route::post('/login/penjual', [PenjualController::class, 'login'])->name('login.penjual.submit');



// Arah untuk register (menampilkan form dan memproses registrasi menggunakan PembeliController)
Route::get('/register', [PembeliController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [PembeliController::class, 'register'])->name('register.submit');

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
Route::get('/dashboard-pembeli', [PembeliController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard.pembeli');

// Dashboard Penjual


// Arah untuk mengatur dashboard pembeli (ini sama dengan /dashboard-pembeli, mungkin bisa disatukan atau salah satunya dihapus jika fungsinya sama)
Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli.index')->middleware('auth');

// Melihat akun pembeli
Route::get('/profile', function () {
    // Pastikan pengguna sudah login untuk mengakses profil
    if (!Auth::check()) {
        return redirect()->route('login')->with('info', 'Silakan login untuk melihat profil.');
    }
    return view('pembeli.profile', [ // Sesuaikan path view jika perlu
        'user' => Auth::user(),
    ]);
})
    ->name('profile.show')
    ->middleware('auth');

// Update profil pembeli
Route::post('/profile/update', [PembeliController::class, 'updateProfile'])
    ->name('profile.update')
    ->middleware('auth');

//Arah untuk your wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])
    ->middleware('auth')
    ->name('wishlist.index');

// Middleware group untuk pembeli
Route::middleware(['auth', CheckRole::class . ':pembeli'])->group(function () {
    Route::get('/my-account', [ProfileController::class, 'show'])->name('myaccount');
    Route::get('/my-account/edit', [ProfileController::class, 'edit'])->name('myaccount.edit');
    Route::post('/my-account/update', [ProfileController::class, 'update'])->name('myaccount.update');
    Route::get('/register/pembeli', [AuthController::class, 'showRegisterForm'])->name('register.pembeli');
    Route::post('/register/pembeli', [AuthController::class, 'register'])->name('register.pembeli.post');
});
