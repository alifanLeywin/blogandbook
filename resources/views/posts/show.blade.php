@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('posts.index') }}" class="btn btn-link text-muted px-0">
            <i class="fas fa-arrow-left me-2"></i> Back to Posts
        </a>
    </div>

    <!-- Post Content -->
    <div class="row">
        <div class="col-lg-8">
            <article class="card shadow-sm">
                <div class="card-body">
                    <!-- Post Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="badge bg-primary rounded-pill">
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </span>
                        <small class="text-muted">
                            <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('F d, Y') }}
                        </small>
                    </div>

                    <!-- Post Title & Content -->
                    <h1 class="display-5 mb-4">{{ $post->title }}</h1>
                    <div class="post-content mb-5">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Author Info -->
                    <div class="d-flex align-items-center border-top pt-4">
                        <div class="avatar">
                            <i class="fas fa-user-circle fa-2x text-muted"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1">{{ $post->user->name ?? 'Anonymous' }}</h6>
                            <small class="text-muted">Author</small>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->
            <section class="mt-5">
                <h3 class="mb-4">Comments</h3>

                <!-- Comment Form -->
                @auth
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Leave a Comment</label>
                                    <textarea class="form-control" id="comment" name="body" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="far fa-paper-plane me-2"></i> Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Please <a href="{{ route('login') }}">login</a> to leave a comment.
                    </div>
                @endauth

                <!-- Comments List -->
                <div class="comments-list">
                    @forelse ($post->comments as $comment)
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user-circle text-muted me-2"></i>
                                        <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <small class="text-muted">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </small>
                                        @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->role === 'admin'))
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <p class="card-text mb-0">{{ $comment->body }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-light">
                            <i class="far fa-comments me-2"></i> No comments yet. Be the first to comment!
                        </div>
                    @endforelse
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 2rem;">
                <!-- Related Posts -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Related Posts</h5>
                        <div class="list-group list-group-flush">
                            @foreach($post->category->posts->except($post->id)->take(3) as $relatedPost)
                                <a href="{{ route('posts.show', $relatedPost) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $relatedPost->title }}</h6>
                                        <small class="text-muted">
                                            <i class="far fa-clock"></i> {{ $relatedPost->created_at->format('M d') }}
                                        </small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Categories</h5>
                        <div class="list-group list-group-flush">
                            @foreach($categories as $category)
                                <a href="{{ route('posts.index', ['category_id' => $category->id]) }}"
                                   class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $category->name }}
                                    <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .post-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #2c3e50;
    }
    .comments-list .card {
        transition: transform 0.2s;
    }
    .comments-list .card:hover {
        transform: translateY(-2px);
    }
    .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }
    .list-group-item-action:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection
