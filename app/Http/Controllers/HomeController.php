<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with('category')
            ->latest()
            ->take(4)
            ->get();

        $posts = Post::with('category')
            ->latest()
            ->take(3)
            ->get();

        $categories = Category::withCount(['books', 'posts'])
            ->take(8)
            ->get();

        return view('home', compact('books', 'posts', 'categories'));
    }
}
