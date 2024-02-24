<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAll(Request $request)
    {
        $data = Book::all();
        return response()->json($data);
    }

    public function getById($id)
    {
        $data = Book::find($id);
        return response()->json($data);
    }
}
