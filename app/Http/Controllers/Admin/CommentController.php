<?php

// app/Http/Controllers/Admin/CommentController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::with('user', 'post')->latest()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted.');
    }
}
