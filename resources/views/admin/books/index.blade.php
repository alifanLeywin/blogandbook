@extends('admin.layouts.app')

@section('content')
<h2>Books</h2>
<a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-2">Add New Book</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>PDF</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->category->name }}</td>
            <td><a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank">View</a></td>
            <td>
                <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
