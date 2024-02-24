<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAll(Request $request)
    {
        $data = new Book;
        if ($request->has('search') && $request->search != '')
            $data = $data->where('name', 'like', "%$request->search%");
        return response()->json($data->get());
    }

    public function getById($id)
    {
        $data = Book::find($id);
        return response()->json($data);
    }
}
