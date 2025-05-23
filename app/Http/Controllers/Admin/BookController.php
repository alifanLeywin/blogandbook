<?php
// app/Http/Controllers/Admin/BookController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index() {
        $books = Book::with('category')->latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'pdf_file' => 'required|file|mimes:pdf|max:10240',
            ]);

            Log::info('File upload started', ['request' => $request->all()]);

            if (!$request->hasFile('pdf_file')) {
                Log::error('No file in request');
                return back()
                    ->withInput()
                    ->with('error', 'No file uploaded.');
            }

            $file = $request->file('pdf_file');
            if (!$file->isValid()) {
                Log::error('Invalid file upload');
                return back()
                    ->withInput()
                    ->with('error', 'Invalid file upload.');            }

            // Generate a unique filename using timestamp and original name
            $filename = time() . '_' . Str::slug($file->getClientOriginalName());

            // Store the file in the public storage books directory
            $pdfPath = $file->storeAs('books', $filename, 'public');

            Log::info('File stored', ['path' => $pdfPath]);

            $book = Book::create([
                'user_id' => Auth::id(),
                'category_id' => $validated['category_id'],
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'description' => $validated['description'],
                'pdf_path' => $pdfPath,
            ]);

            Log::info('Book created', ['book' => $book]);

            return redirect()
                ->route('admin.books.index')
                ->with('success', 'Book uploaded successfully.');

        } catch (\Exception $e) {
            Log::error('Upload failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->with('error', 'Upload failed: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Book $book) {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book) {
        try {
            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'pdf_file' => 'nullable|file|mimes:pdf|max:10240', // Increased max size to 10MB
            ]);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'description' => $request->description,
            ];

            if ($request->hasFile('pdf_file')) {
                $file = $request->file('pdf_file');

                // Delete the old file if it exists
                if ($book->pdf_path && Storage::disk('public')->exists($book->pdf_path)) {
                    Storage::disk('public')->delete($book->pdf_path);
                }

                // Generate a unique filename
                $filename = time() . '_' . Str::slug($file->getClientOriginalName());

                // Store the new file
                $data['pdf_path'] = $file->storeAs('books', $filename, 'public');

                Log::info('File updated', ['old_path' => $book->pdf_path, 'new_path' => $data['pdf_path']]);
            }

            $book->update($data);
            return redirect()->route('admin.books.index')->with('success', 'Book updated.');

        } catch (\Exception $e) {
            Log::error('Update failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->with('error', 'Update failed: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Book $book) {
        Storage::disk('public')->delete($book->pdf_path);
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted.');
    }
}
