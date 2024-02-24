<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\ThreadDetail;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function getAll()
    {
        $data = Thread::with('user', 'threadDetails', 'threadDetails.user')
            ->get()->map(function ($item) {
                $index = count($item->threadDetails) - 1;
                $lastThreadDetail = $item->threadDetails[$index];
                $item['creator_name'] = $item->user->name;
                $item['last_reply'] = $lastThreadDetail->user->name . ", " . date('d-m-Y', strtotime($lastThreadDetail->created_at));
                return $item;
            });
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $user = auth('api')->user();
        $thread = new Thread;
        $thread->user_id = $user->id;
        $thread->name = $request->name;
        $thread->description = $request->description;
        $thread->save();
        return response()->json([
            'message' => 'Berhasil menambah thread'
        ]);
    }

    public function delete($id)
    {
        Thread::find($id)->delete();
        ThreadDetail::where('thread_id', $id)->delete();
        return response()->json([
            'message' => 'Berhasil menghapus thread'
        ]);
    }
}
