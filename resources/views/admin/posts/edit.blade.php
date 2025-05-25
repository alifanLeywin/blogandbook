@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-bumud mb-6">✏️ Edit Post</h1>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST"
        class="space-y-6 bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-bumud mb-1">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-jotu rounded-lg transition" />
        </div>

        {{-- Category --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-bumud mb-1">Category</label>
            <select name="category_id" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-jotu rounded-lg transition">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Content --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-bumud mb-1">Content</label>
            <textarea name="content" rows="5"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-jotu rounded-lg transition">{{ $post->content }}</textarea>
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end gap-2">
            <a class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-6 py-2 rounded-lg shadow-md transition" href="{{ route('admin.posts.index') }}">Back</a>
            <button type="submit"
                class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-6 py-2 rounded-lg shadow-md transition">
                Update
            </button>
        </div>
    </form>
@endsection
