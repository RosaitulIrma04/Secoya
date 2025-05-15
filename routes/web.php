<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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