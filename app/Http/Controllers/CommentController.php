<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        try {
            $user_id = Auth::id();

            Comment::create([
                'content' => $request->newComment,
                'count_likes' => 0,
                'user_id' => $user_id,
                'news_id' => $news->id,
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('news.show', $news->id);
    }

    public function edit(Request $request, Comment $comment)
    {
        try {
            $comment->update([
                'content' => $request->text_comment,
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return redirect()->route('news.show', $comment->news_id);
    }

    public function destroy(News $news, Comment $comment)
    {
        try {
            $comment->delete();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return redirect()->route('news.show', $news->id);
    }
}
