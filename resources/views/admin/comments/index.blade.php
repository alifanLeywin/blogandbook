@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold mb-4 text-jotu dark:text-bumud">Comments</h2>
    <div class="overflow-x-auto rounded-lg shadow border border-gray-200 dark:border-gray-700">
        <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg">
            <thead>
                <tr class="bg-gray-100 dark:bg-bumud text-left text-sm font-semibold text-gray-600 dark:text-gray-700">
                    <th class="py-3 px-4">User</th>
                    <th class="py-3 px-4">Post</th>
                    <th class="py-3 px-4">Content</th>
                    <th class="py-3 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                <tr class="border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="py-2 px-4 text-gray-900 dark:text-gray-100">{{ $comment->user->name }}</td>
                    <td class="py-2 px-4 text-gray-900 dark:text-gray-100">{{ $comment->post->title }}</td>
                    <td class="py-2 px-4 text-gray-900 dark:text-gray-100">{{ $comment->body }}</td>
                    <td class="py-2 px-4">
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500 dark:text-gray-400">
                        Tidak ada komentar ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
