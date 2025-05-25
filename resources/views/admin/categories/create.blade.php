@extends('admin.layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-jotu dark:text-bumud">
        {{ isset($category) ? 'Edit Category' : 'Add New Category' }}
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
          action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
          class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-5">

        @csrf
        @if(isset($category)) @method('PUT') @endif

        <!-- Name -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $category->name ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('name') border-red-500 @enderror"
                   required>
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200 mb-1">Slug</label>
            <input type="text"
                   name="slug"
                   value="{{ old('slug', $category->slug ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-jotu transition @error('slug') border-red-500 @enderror"
                   required>
            @error('slug')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-2">
            <a class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-5 py-2 rounded-lg transition"
               href="{{ route('admin.categories.index') }}">Back</a>

            <button type="submit"
                    class="bg-jotu dark:bg-jobu hover:bg-jodeng dark:hover:bg-jocet text-white px-5 py-2 rounded-lg transition">
                {{ isset($category) ? 'Update Category' : 'Save Category' }}
            </button>
        </div>
    </form>
@endsection
