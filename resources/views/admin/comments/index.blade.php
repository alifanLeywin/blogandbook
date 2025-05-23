@extends('admin.layouts.app')

@section('content')
<h2>Comments</h2>

<table class="table table-bordered">
    <thead>
        <tr><th>User</th><th>Post</th><th>Content</th><th>Action</th></tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->user->name }}</td>
            <td>{{ $comment->post->title }}</td>
            <td>{{ $comment->body }}</td>
            <td>
                <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
