@extends('admin.layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-jotu dark:text-bumud">
        {{ isset($book) ? 'Edit Book' : 'Add New Book' }}
    </h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-200 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('title') border-red-500 @enderror"
                   required>
            @error('title')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Description</label>
            <textarea name="description"
                      rows="3"
                      required
                      class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('description') border-red-500 @enderror">{{ old('description', $book->description ?? '') }}</textarea>
            @error('description')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Category</label>
            <select name="category_id"
                    required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('category_id') border-red-500 @enderror">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old('category_id', $book->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- PDF Upload -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Upload PDF</label>
            <input type="file"
                   name="pdf_file"
                   accept=".pdf"
                   {{ isset($book) ? '' : 'required' }}
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('pdf_file') border-red-500 @enderror">
            @error('pdf_file')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
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
