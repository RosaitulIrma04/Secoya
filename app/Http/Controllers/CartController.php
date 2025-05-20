<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
     public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('cart.checkout', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $qty = $request->input('qty', 1);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => $qty,
            ];
        }
        session(['cart' => $cart]);

        // Untuk AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart_count' => array_sum(array_column($cart, 'quantity')),
                'cart_items' => array_values($cart),
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $quantity);
            session(['cart' => $cart]);
        }

        // Hitung ulang total
        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        $subtotal = $cart[$id]['price'] * $cart[$id]['quantity'];

        return response()->json([
            'success' => true,
            'quantity' => $cart[$id]['quantity'],
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('id');
        unset($cart[$id]);
        session(['cart' => $cart]);

        // Hitung ulang total
        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        return response()->json([
            'success' => true,
            'total' => $total,
        ]);
    }
}
