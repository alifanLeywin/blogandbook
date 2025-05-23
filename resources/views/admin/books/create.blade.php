@extends('admin.layouts.app')

@section('content')
<h2>{{ isset($book) ? 'Edit Book' : 'Add New Book' }}</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ isset($book) ? route('admin.books.update', $book) : route('admin.books.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($book)) @method('PUT') @endif

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $book->title ?? '') }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description', $book->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $book->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Upload PDF</label>
        <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror" {{ isset($book) ? '' : 'required' }} accept=".pdf">
        @error('pdf_file')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if(isset($book) && $book->pdf_path)
            <small class="text-muted">Current: <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank">View PDF</a></small>
        @endif
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
