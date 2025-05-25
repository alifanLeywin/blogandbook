<aside id="sidebar"
       class="bg-jotu text-white mx-3 my-3 h-[calc(100vh-2rem)] z-50 p-5 rounded-3xl shadow-md transition-all duration-300 ease-in-out w-64 dark:bg-jobu"
>

    
    <!-- Logo -->
    <div class="text-center text-xl font-bold mb-6 flex items-center justify-center gap-2">
        <i class="fas fa-book-open text-jodeng dark:text-jocet"></i>
        <span class="sidebar-text">MyApp</span>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 mt-4">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 p-2 rounded hover:bg-jodeng dark:hover:bg-jocet {{ request()->routeIs('admin.dashboard') ? 'bg-jodeng dark:bg-jocet' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span class="sidebar-text">Dashboard</span>
        </a>
        <a href="{{ route('admin.posts.index') }}"
           class="flex items-center gap-3 p-2 rounded hover:bg-jodeng dark:hover:bg-jocet{{ request()->routeIs('admin.posts.*') ? 'bg-jodeng dark:bg-jocet' : '' }}">
            <i class="fas fa-newspaper"></i>
            <span class="sidebar-text">Posts</span>
        </a>
        <a href="{{ route('admin.books.index') }}"
           class="flex items-center gap-3 p-2 rounded hover:bg-jodeng dark:hover:bg-jocet{{ request()->routeIs('admin.books.*') ? 'bg-jodeng dark:bg-jocet' : '' }}">
            <i class="fas fa-book"></i>
            <span class="sidebar-text">Books</span>
        </a>
        <a href="{{ route('admin.categories.index') }}"
           class="flex items-center gap-3 p-2 rounded hover:bg-jodeng dark:hover:bg-jocet{{ request()->routeIs('admin.categories.*') ? 'bg-jodeng dark:bg-jocet' : '' }}">
            <i class="fas fa-folder"></i>
            <span class="sidebar-text">Categories</span>    
        </a>
        <a href="{{ route('admin.comments.index') }}"
           class="flex items-center gap-3 p-2 rounded hover:bg-jodeng dark:hover:bg-jocet{{ request()->routeIs('admin.comments.*') ? 'bg-jodeng dark:bg-jocet' : '' }}">
            <i class="fas fa-comments"></i>
            <span class="sidebar-text">Comments</span>
        </a>
        <a href="{{ route('admin.users.index') }}"
           class="flex items-center gap-3 p-2 rounded hover:bg-jodeng dark:hover:bg-jocet{{ request()->routeIs('admin.users.*') ? 'bg-jodeng dark:bg-jocet' : '' }}">
            <i class="fas fa-users"></i>
            <span class="sidebar-text">Users</span>
        </a>
    </nav>
</aside>