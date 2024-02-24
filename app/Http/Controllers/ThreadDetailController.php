<?php

namespace App\Http\Controllers;

use App\Models\ThreadDetail;
use Illuminate\Http\Request;

class ThreadDetailController extends Controller
{
    public function getAll($threadId)
    {
        $data = ThreadDetail::where('thread_id', $threadId)
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $user = auth('api')->user();
        $data = new ThreadDetail;
        $data->thread_id = $request->thread_id;
        $data->user_id = $user->id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return response()->json([
            'message' => 'Berhasil menambah pesan'
        ]);
    }

    public function delete($id)
    {
        ThreadDetail::find($id)->delete();
        return response()->json([
            'message' => 'Berhasil menghapus pesan'
        ]);
    }
}
