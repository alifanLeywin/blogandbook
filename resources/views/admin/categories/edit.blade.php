@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <!-- Form Edit Category -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-jotu dark:text-bumud">
            Edit Category
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

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Category Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.categories.index') }}"
                   class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-5 py-2 rounded-lg transition flex items-center gap-2">
                   <i class="fas fa-arrow-left"></i> Back
                </a>
                <button type="submit"
                        class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-5 py-2 rounded-lg transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Update Category
                </button>
            </div>
        </form>
    </div>

    <!-- Category Details -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Category Details</h3>

        <dl class="space-y-4 text-gray-700 dark:text-gray-300">
            <div class="flex justify-between">
                <dt>Created At</dt>
                <dd>{{ $category->created_at->format('d M Y, H:i') }}</dd>
            </div>
            <div class="flex justify-between">
                <dt>Last Updated</dt>
                <dd>{{ $category->updated_at->format('d M Y, H:i') }}</dd>
            </div>
            <div class="flex justify-between items-center">
                <dt>Total Posts</dt>
                <dd>
                    <span class="inline-block bg-info text-white px-3 py-1 rounded-full text-sm">
                        {{ $category->posts->count() }} Posts
                    </span>
                </dd>
            </div>
            <div class="flex justify-between items-center">
                <dt>Total Books</dt>
                <dd>
                    <span class="inline-block bg-green-600 text-white px-3 py-1 rounded-full text-sm">
                        {{ $category->books->count() }} Books
                    </span>
                </dd>
            </div>
        </dl>
    </div>

</div>
@endsection
