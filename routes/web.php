<?php

use Illuminate\Support\Facades\Route;

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
