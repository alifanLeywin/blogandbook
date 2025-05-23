@extends('admin.layouts.app')

@section('content')
    <h1>Create Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
@endsection
