<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostViewController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()
            ->with('category')
            ->withCount('comments');  // Add this to count comments

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }        if ($request->filled('category_id')) {
            $category_id = (int) $request->input('category_id');

            Log::info('Category filter applied:', [
                'category_id' => $category_id,
                'request_all' => $request->all()
            ]);

            // Clone query untuk logging
            $queryClone = clone $query;
            $queryClone->where('category_id', $category_id);

            Log::info('SQL Query:', [
                'sql' => $queryClone->toSql(),
                'bindings' => $queryClone->getBindings()
            ]);

            // Aplikasikan filter ke query asli
            $query->where('category_id', $category_id);
        }

        $posts = $query->latest()->paginate(10);

        // Append query parameters to pagination links
        $posts->appends($request->all());

        // Get categories with their post counts
        $categories = \App\Models\Category::withCount('posts')->get();

        return view('posts.index', compact('posts', 'categories'));
    }


    public function show($id)
    {
        $post = Post::with(['comments.user', 'category.posts', 'user'])->findOrFail($id);
        $categories = \App\Models\Category::withCount('posts')->get();
        return view('posts.show', compact('post', 'categories'));
    }
}
