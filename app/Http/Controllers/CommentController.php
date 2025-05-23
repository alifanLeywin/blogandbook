<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'required|min:3|max:1000'
        ]);

        $comment = $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $validated['body']
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }
}
