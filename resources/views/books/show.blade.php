@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $book->title }}</h2>
            <p class="card-text">{{ $book->description }}</p>

            @if($book->pdf_path)
                <div class="bg-light p-3 rounded">
                    <iframe src="{{ asset('storage/' . $book->pdf_path) }}"
                            width="100%"
                            height="600px"
                            class="border-0"
                            title="PDF Viewer">
                        <p>Your browser doesn't support iframes. You can
                            <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank">download the PDF</a> instead.
                        </p>
                    </iframe>
                </div>
            @else
                <div class="alert alert-info">
                    No PDF file available for this book.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
