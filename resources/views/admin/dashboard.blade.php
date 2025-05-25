@extends('admin.layouts.app')

@php
    $recentUsers = \App\Models\User::latest()->take(5)->get();

    use App\Models\User;
    use App\Models\Post;
    use App\Models\Category;

    $totalUsers = User::count();
    $totalPosts = Post::count();
    $totalCategories = Category::count();
@endphp

@section('content')
<div class="space-y-6">

    <!-- Greeting -->
    <div class="mb-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-extrabold text-jotu dark:text-jobu mb-2">
            {{ greetingMessage() }}, Admin!
        </h1>
        <p class="text-gray-600 dark:text-gray-300">Welcome back to your dashboard.</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition flex items-center space-x-4">
            <div class="bg-jotu dark:bg-jobu p-3 rounded-full text-white">
                <i class="fas fa-users fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Total Users</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $totalUsers }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition flex items-center space-x-4">
            <div class="bg-jotu dark:bg-jocet p-3 rounded-full text-white">
                <i class="fas fa-file-alt fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Total Posts</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $totalPosts }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition flex items-center space-x-4">
            <div class="bg-jotu dark:bg-jobu p-3 rounded-full text-white">
                <i class="fas fa-tags fa-lg"></i>
            </div>
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Categories</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $totalCategories }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Users Table -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Recent Users</h2>
        <table class="w-full table-auto text-left">
            <thead>
                <tr class="border-b border-gray-300 dark:border-gray-700">
                    <th class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">Name</th>
                    <th class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">Email</th>
                    <th class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">Role</th>
                    <th class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">Joined</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentUsers as $user)
                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition">
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4 capitalize">{{ $user->role }}</td>
                    <td class="py-2 px-4">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@php
function greetingMessage() {
    $hour = now()->format('H');
    if ($hour < 12) return 'Selamat pagi';
    if ($hour < 15) return 'Selamat siang';
    if ($hour < 18) return 'Selamat sore';
    return 'Selamat malam';
}
@endphp
