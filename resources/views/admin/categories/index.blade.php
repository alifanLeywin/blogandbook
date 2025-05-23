@extends('admin.layouts.app')

@section('content')
<h2>Categories</h2>
<a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-2">Add New Category</a>

<table class="table table-bordered">
    <thead>
        <tr><th>Name</th><th>Slug</th><th>Action</th></tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
