@extends('admin.layouts.app')

@section('content')
<h2>{{ isset($category) ? 'Edit Category' : 'Add New Category' }}</h2>

<form method="POST" action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
    @csrf
    @if(isset($category)) @method('PUT') @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
