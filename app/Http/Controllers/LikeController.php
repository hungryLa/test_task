<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Comment $comment)
    {
        try {
            $user_id = Auth::id();
            $like = Like::create([
                'user_id' => $user_id,
                'liked_id' => $comment->id,
            ]);
            $comment->update([
                'count_likes' => $comment->count_likes + 1,
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return back();
    }

    public function unlike(Comment $comment)
    {
        try {
            $user_id = Auth::id();
            Like::where('user_id', $user_id)->where('liked_id', $comment->id)->delete();
            $comment->update([
                'count_likes' => $comment->count_likes - 1,
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return back();
    }
}
