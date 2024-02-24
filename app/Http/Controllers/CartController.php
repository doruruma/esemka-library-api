<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getAll()
    {
        $user = auth('api')->user();
        $data = Cart::where('user_id', $user->id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $user = auth('api')->user();
        $cart = new Cart;
        $cart->book_id = $request->book_id;
        $cart->user_id = $user->id;
        $cart->quantity = 1;
        $cart->save();
        return response()->json([
            'message' => 'Berhasil menambah buku ke keranjang'
        ]);
    }
}
