@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-jotu dark:text-bumud">📄 Posts</h1>
        <a href="{{ route('admin.posts.create') }}"
           class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white py-2 px-4 rounded-lg shadow-md transition-all duration-200">
            + Add Post
        </a>
    </div>

    <div class="bg-white dark:bg-jotu shadow-lg rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-200 dark:bg-bumud text-gray-700 dark:text-gray-700 text-sm uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left">Title</th>
                        <th class="px-6 py-3 text-left">Category</th>
                        <th class="px-6 py-3 text-left">Slug</th>
                        <th class="px-6 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white border-gray-200 dark:bg-gray-900 text-jotu dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">{{ $post->category->name }}</td>
                            <td class="px-6 py-4">{{ $post->slug }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm shadow transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus post ini?')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm shadow transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                Belum ada post.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
