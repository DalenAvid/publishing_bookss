<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class LibraryController extends Controller
{
    // public function library()
    // {
    //     return view('library');
    // }
    public function library()
    {
        $books = Book::all();
    
        return view('library', compact('books'));
    }
    public function index(Request $request)
    {
        $genres = Book::select('genre')->distinct()->pluck('genre');
        $selectedGenre = $request->query('genre');
        
        $books = Book::when($selectedGenre, function($query, $genre) {
            return $query->where('genre', $genre);
        })->get();
    
        return view('library.index', compact('books', 'genres', 'selectedGenre'));
    }
    

}