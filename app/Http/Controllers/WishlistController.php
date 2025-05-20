<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        $wishlist = session()->get('wishlist', []);
        $id = $request->input('id');
        $wishlist[$id] = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
        ];
        session(['wishlist' => $wishlist]);
        return response()->json([
            'success' => true,
            'wishlist_count' => count($wishlist),
            'wishlist_items' => array_values($wishlist)
        ]);
    }
}
