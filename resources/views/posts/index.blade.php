@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="display-4 mb-3">Blog Posts</h1>
            <p class="lead text-muted">Explore our latest articles and stories</p>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <form method="GET" action="{{ route('posts.index') }}" class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search posts...">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="category_id" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-1"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="row g-4">
        @forelse($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary rounded-pill">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                            <small class="text-muted">
                                <i class="far fa-clock"></i> {{ $post->created_at->format('M d, Y') }}
                            </small>
                        </div>
                        <h5 class="card-title mb-3">{{ $post->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($post->content, 150) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">
                                Read More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                            <div class="text-muted">
                                <i class="far fa-comment"></i>
                                {{ $post->comments_count }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> No posts found.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
    </div>
</div>

<style>
    .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }
    .card-title {
        color: #2c3e50;
        font-weight: 600;
    }
    .pagination {
        margin-bottom: 0;
    }
    .page-link {
        padding: 0.75rem 1rem;
        color: #2c3e50;
        border: none;
    }
    .page-item.active .page-link {
        background-color: #3498db;
        border-color: #3498db;
    }
</style>
@endsection
