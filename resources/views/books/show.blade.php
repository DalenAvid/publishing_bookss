@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Rating:</strong> {{ $book->rating }}</p>
        <p><strong>Language:</strong> {{ $book->language }}</p>
        <p><strong>Age Recommendation:</strong> {{ $book->age_recommendation }}</p>
        <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Comment:</strong> {{ $book->comment }}</p>
        <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" class="img-fluid">
        <a href="{{ route('books.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection
