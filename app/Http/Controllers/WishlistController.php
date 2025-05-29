<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Wishlist;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
// Menampilkan semua wishlist milik user yang sedang login
public function index()
{
    // Ambil wishlist berdasarkan user yang sedang login
    Wishlist::where('user_id', Auth::user()->id)->get();

    return view('wishlist.index', compact('wishlists'));
}
// Menambahkan produk ke wishlist
public function store($productId)
{
    // Pastikan produk yang dimaksud ada
    $product = Product::findOrFail($productId);

    // Simpan wishlist jika belum ada
    Wishlist::firstOrCreate([
        'user_id' => Auth::id(),
        'product_id' => $product->id,
    ]);

    return back()->with('success', 'Produk disimpan ke wishlist.');
}

// Menghapus produk dari wishlist
public function destroy($productId)
{
    // Pastikan produk yang dimaksud ada (opsional, bisa dihilangkan jika tidak perlu error handling)
    $product = Product::findOrFail($productId);

    Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

    return back()->with('success', 'Produk dihapus dari wishlist.');
}}