@extends('admin.layouts.app')

@section('content')
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-jotu dark:text-bumud">📁 Categories</h2>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white py-2 px-4 inline-block rounded-lg shadow-md transition">
                + Add New Category
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-sm">
                    <thead class="bg-gray-200 dark:bg-bumud text-left font-semibold text-gray-700 dark:text-gray-700">
                        <tr>
                            <th class="py-3 px-6">NAME</th>
                            <th class="py-3 px-6">SLUG</th>
                            <th class="py-3 px-6">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        @forelse($categories as $category)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="py-3 px-6">{{ $category->name }}</td>
                                <td class="py-3 px-6">{{ $category->slug }}</td>
                                <td class="py-3 px-6 space-x-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada kategori tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
