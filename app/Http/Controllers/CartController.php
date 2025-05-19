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
        $cart = session()->get('cart', []);
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $qty = $request->input('qty', 1);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => $qty,
            ];
        }
        session(['cart' => $cart]);
        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart_items' => array_values($cart)
        ]);
    }
}
