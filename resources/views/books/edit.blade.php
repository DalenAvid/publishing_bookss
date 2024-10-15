@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('books.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
