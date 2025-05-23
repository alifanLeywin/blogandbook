@extends('admin.layouts.app')

@section('content')
<h2>{{ isset($book) ? 'Edit Book' : 'Add New Book' }}</h2>

<form method="POST" action="{{ isset($book) ? route('admin.books.update', $book) : route('admin.books.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($book)) @method('PUT') @endif

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $book->slug ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (isset($book) && $book->category_id == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Upload PDF</label>
        <input type="file" name="pdf_path" class="form-control" {{ isset($book) ? '' : 'required' }}>
        @if(isset($book))
            <small>Current: <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank">View PDF</a></small>
        @endif
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
