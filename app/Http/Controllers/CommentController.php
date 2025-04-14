<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\MatchResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, MatchResult $matchResult)
    {
        $request->validate([
            'body' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment([
            'user_id' => Auth::id(),
            'match_result_id' => $matchResult->id,
            'parent_id' => $request->input('parent_id'),
            'body' => $request->input('body'),
        ]);
        $comment->save();

        return back()->with('success', 'コメントを投稿しました。'); // リダイレクト先は適宜変更
    }

    // コメントの削除など、必要に応じてメソッドを追加
}