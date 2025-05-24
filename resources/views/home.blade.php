@extends('layouts.app')

@section('content')
<div class="hero-section bg-primary text-white py-5 mb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Welcome to Blog & Book</h1>
                <p class="lead">Discover amazing books and engaging blog posts all in one place.</p>
                @guest
                    <div class="mt-4">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">Get Started</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Sign In</a>
                    </div>
                @endguest
            </div>
            <div class="col-md-6">
                <img src="https://www.pngkey.com/png/detail/204-2046184_banner-policy-rules-rules-anime-banner.png" alt="Hero Image" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Featured Books Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0">Featured Books</h2>
            <a href="{{ route('books.index') }}" class="btn btn-outline-primary">View All Books</a>
        </div>
        <div class="row">
            @forelse($books ?? [] as $book)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($book->description, 100) }}</p>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">No books available yet.</div>
            </div>
            @endforelse
        </div>
    </section>

    <!-- Latest Posts Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0">Latest Blog Posts</h2>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">View All Posts</a>
        </div>
        <div class="row">
            @forelse($posts ?? [] as $post)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="text-muted small">
                            <i class="fas fa-calendar-alt"></i> {{ $post->created_at->format('M d, Y') }}
                            <span class="mx-2">|</span>
                            <i class="fas fa-folder"></i> {{ $post->category->name }}
                        </p>
                        <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">No blog posts available yet.</div>
            </div>
            @endforelse
        </div>
    </section>

    <!-- Categories Section -->
    <section class="mb-5">
        <h2 class="h3 mb-4">Browse Categories</h2>
        <div class="row g-3">
            @forelse($categories ?? [] as $category)
            <div class="col-md-3">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="text-muted small mb-0">
                            {{ $category->books_count ?? 0 }} Books | {{ $category->posts_count ?? 0 }} Posts
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">No categories available yet.</div>
            </div>
            @endforelse
        </div>
    </section>

    <!-- About/Creator Section -->
    <section class="py-5 bg-light rounded-3 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://avatars.githubusercontent.com/u/178992257?v=4" alt="Creator"
                         class="img-fluid rounded-circle shadow" style="max-width: 300px;">
                </div>
                <div class="col-md-6">
                    <h2 class="h3 mb-4">About the Creator</h2>
                    <div class="mb-4">
                        <h4 class="h5 text-primary">alifanLeywin</h4>
                        <p class="lead">Passionate about creating beautiful and functional web applications using Laravel and modern web technologies.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/alifanLeywin" target="_blank" class="btn btn-dark">
                            <i class="fab fa-github me-2"></i>GitHub
                        </a>
                    </div>
                    <div class="mt-4">
                        <h5 class="h6 mb-3">Tech Stack Used:</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary">Laravel</span>
                            <span class="badge bg-info">PHP</span>
                            <span class="badge bg-success">MySQL</span>
                            <span class="badge bg-warning text-dark">JavaScript</span>
                            <span class="badge bg-danger">HTML5/CSS3</span>
                            <span class="badge bg-secondary">Bootstrap 5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>

    <!-- About/Creator Section -->
    <section class="py-5 bg-light rounded-3 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://avatars.githubusercontent.com/u/149368023?v=4" alt="Creator"
                         class="img-fluid rounded-circle shadow" style="max-width: 300px;">
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <h4 class="h5 text-primary">Rafpelmln</h4>
                        <p class="lead">Passionate about creating beautiful and functional web applications using Laravel and modern web technologies.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/rafpelmln" target="_blank" class="btn btn-dark">
                            <i class="fab fa-github me-2"></i>GitHub
                        </a>
                    </div>
                    <div class="mt-4">
                        <h5 class="h6 mb-3">Tech Stack Used:</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary">Laravel</span>
                            <span class="badge bg-info">PHP</span>
                            <span class="badge bg-success">MySQL</span>
                            <span class="badge bg-warning text-dark">JavaScript</span>
                            <span class="badge bg-danger">HTML5/CSS3</span>
                            <span class="badge bg-secondary">Bootstrap 5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
