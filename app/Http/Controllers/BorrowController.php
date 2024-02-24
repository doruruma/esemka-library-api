<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Cart;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function getAll()
    {
        $user = auth('api')->user();
        $data = Borrow::with('borrowDetails')->where('user_id', $user->id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $user = auth('api')->user();
        $borrow = new Borrow();
        $borrow->user_id = $user->id;
        $borrow->start_date = $request->start_date;
        $borrow->end_date = $request->end_date;
        $borrow->save();
        $carts = Cart::where('user_id', $user->id);
        foreach ($carts->get() as $cart) {
            $detail = new BorrowDetail;
            $detail->borrow_id = $borrow->id;
            $detail->book_id = $cart->book_id;
            $detail->status = 'Dipinjam';
            $detail->save();
        }
        $carts->delete();
        return response()->json([
            'message' => 'Berhasil menambah peminjaman'
        ]);
    }
}
