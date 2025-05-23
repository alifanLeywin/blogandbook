<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.books.index') }}">Books</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.posts.index') }}">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.comments.index') }}">Comments</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Users</a></li>
            <!-- Tambahkan ini di bagian navigasi/layout -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container">
                    <div class="ml-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

        </ul>
    </div>
</nav>
