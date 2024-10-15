<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            @include('books.form')
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
