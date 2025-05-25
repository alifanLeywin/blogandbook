@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-bumud mb-6">📝 Create Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
            <input type="text" name="title" id="title" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-jotu transition" />
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
            <select name="category_id" id="category_id" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-jotu transition">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
            <textarea name="content" id="content" rows="5"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-jotu transition"></textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-6 py-2 rounded-lg shadow-md transition" href="{{ route('admin.posts.index') }}">Back</a>
            <button type="submit"
                class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-6 py-2 rounded-lg shadow-md transition-all duration-200">
                Save
            </button>
        </div>
    </form>
@endsection
