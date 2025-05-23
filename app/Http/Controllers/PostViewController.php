<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostViewController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()
            ->with('category')
            ->withCount('comments');  // Add this to count comments

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $posts = $query->latest()->paginate(10);
        $categories = \App\Models\Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }


    public function show($id)
    {
        $post = Post::with(['comments.user', 'category.posts', 'user'])->findOrFail($id);
        $categories = \App\Models\Category::withCount('posts')->get();
        return view('posts.show', compact('post', 'categories'));
    }
}
