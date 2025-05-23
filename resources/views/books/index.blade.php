@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="display-4 mb-3">Explore Our Books</h1>
            <p class="lead text-muted">Discover our collection of amazing books that will inspire and enlighten you.</p>
        </div>
        <div class="col-lg-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Books</h5>
                    <p class="display-6 mb-0">{{ $books->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Books Grid -->
    <div class="row g-4">
        @forelse($books as $book)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title text-primary mb-0">{{ $book->title }}</h5>
                        <span class="badge bg-info rounded-pill">
                            {{ $book->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>

                    <p class="card-text text-muted mb-3">
                        {{ Str::limit($book->description, 120) }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary">
                            <i class="fas fa-book-open me-1"></i> Read More
                        </a>
                        @if($book->pdf_path)
                        <a href="{{ asset('storage/' . $book->pdf_path) }}" class="btn btn-link text-muted" target="_blank">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i> No books available yet.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($books->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $books->links() }}
    </div>
    @endif
</div>

<style>
    .card {
        border: none;
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }
    .pagination {
        margin-bottom: 0;
    }
    .page-link {
        padding: 0.75rem 1rem;
        border: none;
        color: #2c3e50;
    }
    .page-link:hover {
        background-color: #e9ecef;
        color: #2c3e50;
    }
    .page-item.active .page-link {
        background-color: #3498db;
        border-color: #3498db;
    }
</style>
@endsection
