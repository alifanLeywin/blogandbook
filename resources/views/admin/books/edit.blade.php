@extends('admin.layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-jotu dark:text-bumud">
        {{ isset($book) ? 'Edit Book' : 'Add New Book' }}
    </h2>

    <form method="POST"
          action="{{ isset($book) ? route('admin.books.update', $book) : route('admin.books.store') }}"
          enctype="multipart/form-data"
          class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-5">

        @csrf
        @if(isset($book)) @method('PUT') @endif

        <!-- Title -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $book->title ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition"
                   required>
        </div>

        <!-- Slug -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Slug</label>
            <input type="text"
                   name="slug"
                   value="{{ old('slug', $book->slug ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition"
                   required>
        </div>

        <!-- Category -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Category</label>
            <select name="category_id"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition"
                    required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (isset($book) && $book->category_id == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- PDF Upload -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Upload PDF</label>
            <input type="file"
                   name="pdf_path"
                   accept=".pdf"
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition"
                   {{ isset($book) ? '' : 'required' }}>
            @if(isset($book) && $book->pdf_path)
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                    Current File: <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank"
                                     class="text-blue-600 dark:text-blue-400 hover:underline">View PDF</a>
                </p>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-2">
            <a class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-5 py-2 rounded-lg transition" href="{{ route('admin.books.index') }}">Back</a>
            <button type="submit"
                    class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-5 py-2 rounded-lg transition">
                {{ isset($book) ? 'Update Book' : 'Save Book' }}
            </button>
        </div>
    </form>
@endsection
