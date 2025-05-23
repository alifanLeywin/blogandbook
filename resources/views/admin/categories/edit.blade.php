@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mt-4 mb-4">Edit Category</h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-folder"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $category->name) }}" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Category Details</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Created At</dt>
                        <dd class="col-sm-8">{{ $category->created_at->format('d M Y, H:i') }}</dd>

                        <dt class="col-sm-4">Last Updated</dt>
                        <dd class="col-sm-8">{{ $category->updated_at->format('d M Y, H:i') }}</dd>

                        <dt class="col-sm-4">Total Posts</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-info">
                                {{ $category->posts->count() }} Posts
                            </span>
                        </dd>

                        <dt class="col-sm-4">Total Books</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-success">
                                {{ $category->books->count() }} Books
                            </span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
