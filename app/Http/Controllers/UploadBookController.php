<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
class UploadBookController extends Controller
{
    public function create()
    {
        return view('uploadBook');
    }
    public function preview(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'language' => 'required|string|max:50',
        'genre' => 'required|string|max:255',
        'age' => 'required|integer',
   
        'year' => 'required|integer',
        'pages' => 'required|integer',
        'book_file' => 'required|file',
        'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // $bookFilePath = $request->file('book_file')->store('temp_books');
    // $coverImagePath = $request->file('cover_image')->store('temp_covers','public');
    // $request->session()->put('book_data', [
    //     'title' => $validatedData['title'],
    //     'cover_image' => $coverImagePath,
    //     'book_file' => $bookFilePath,
        
    // ]);
    
    // return redirect()->route('preview.new');
    if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('temp_cover_images', 'public');
        $validatedData['cover_image'] = $path;
    }

    $request->session()->put('book_data', $validatedData);

    return redirect()->route('preview.new');
    // $request->session()->put('book_data', [
    //     'title' => $validatedData['title'],
    //     'description' => $validatedData['description'],
    //     'language' => $validatedData['language'],
    //     'genre' => $validatedData['genre'],
    //     'age' => $validatedData['age'],
    //     'year' => $validatedData['year'],    
    //     'pages' => $validatedData['pages'],
    //     'book_file' => $bookFilePath,
    //     'cover_image' => $coverImagePath,
    // ]);
    // return redirect()->route('preview.new');
    // $bookData = $request->session()->get('bookData');

    // if (!$bookData) {
    //     return redirect()->route('book.upload')->with('error', 'Немає даних для передперегляду.');
    // }

    // return view('preview', compact('bookData'));
}
public function previewNew(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'language' => 'required|string|max:50',
        'genre' => 'required|string|max:255',
        'age' => 'required|integer',
       
        'year' => 'required|integer',
        'pages' => 'required|integer',
        'book_file' => 'required|file',
        'cover_image' => 'required|image',
    ]);

    $path = $request->file('cover_image')->store('covers', 'public');

    $bookData = [
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'language' => $validatedData['language'],
        'genre' => $validatedData['genre'],
        'age' => $validatedData['age'],
        'year' => $validatedData['year'],
        'pages' => $validatedData['pages'],
        'cover_image' => $path,
    ];

    $request->session()->put('book_data', $bookData);
    return redirect()->route('preview.new');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'language' => 'required|string|max:50',
        'genre' => 'required|string|max:255',
        'age' => 'required|integer',
       
        'year' => 'required|integer',
        'pages' => 'required|integer',
        'book_file' => 'required|file',
        'cover_image' => 'required|image',
    ]);
    // $coverPath = $request->file('cover_image')->store('covers', 'public');
    // $bookPath = $request->file('book_file')->store('books', 'public');

    // Book::create([
    //     'title' => $validated['title'],
    //     'description' => $validated['description'],
    //     'language' => $validated['language'],
    //     'age' => $validated['age'],
    //     'genre' => $validated['genre'],
    //     'year' => $validated['year'],
    //     'pages' => $validated['pages'],
    //     'book_file' => $bookPath,
    //     'cover_image' => $coverPath,
        
    // ]);

    // return redirect()->route('library');
    $bookFilePath = $request->file('book_file')->store('books', 'public');
    $coverImagePath = $request->file('cover_image')->store('covers', 'public');

    $book = new Book([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'language' => $validated['language'],
        'genre' => $validated['genre'],
        'age' => $validated['age'],
        'year' => $validated['year'],
        'pages' => $validated['pages'],
        'book_file' => $bookFilePath,
        'cover_image' => $coverImagePath,
    ]);

    $book->save();

    return redirect()->route('library')->with('success', 'Книга успішно завантажена');
    // $bookFilePath = $request->file('book_file')->store('temp_books');
    // $coverImagePath = $request->file('cover_image')->store('temp_covers','public');

    // $request->session()->put('book_data', [
    //     'title' => $validatedData['title'],
    //     'description' => $validatedData['description'],
    //     'language' => $validatedData['language'],
    //     'genre' => $validatedData['genre'],
    //     'age' => $validatedData['age'],
    //     'year' => $validatedData['year'],
    //     'pages' => $validatedData['pages'],
    //     'book_file' => $bookFilePath,
    //     'cover_image' => $coverImagePath,
    // ]);

    // return redirect()->route('preview.new');
}

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string|max:1000',
    //         'language' => 'required|string|max:50',
    //         'genre' => 'required|string|max:255',
    //         'age' => 'required|string|max:50',
    //         'year' => 'required|integer|min:0',
    //         'pages' => 'required|integer|min:1',
    //         'book_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
    //         'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $bookPath = $request->file('book_file')->store('books');
    //     $coverPath = $request->file('cover_image')->store('covers');

    //     // return redirect()->route('library')->with('success', 'Книгу успішно завантажено!');
    //     return redirect()->route('book.preview.page')->with('success', 'Книгу успішно завантажено!');
    // }
    public function showPreviewPage(Request $request)
    {
        $bookData = $request->session()->get('book_data');

        if (!$bookData) {
            return redirect()->route('book.upload')->with('error', 'Дані книги не знайдені.');
        }

        return view('preview', [
            'cover_image' => Storage::url($bookData['cover_image']),
            'title' => $bookData['title']
        ]);
        // $bookData = $request->session()->get('book_data');

        // if (!$bookData) {
        //     return redirect()->route('book.upload')->with('error', 'Дані книги не знайдені');
        // }

        // return view('preview', ['book' => $bookData]);
    }
    public function showPreview(Request $request)
    {
        $bookData = $request->session()->get('book_data');
        return view('preview', ['book' => $bookData]);
    }
    public function previewPage()
    {
        $bookData = session('book_data');
        if (!$bookData) {
            return redirect()->route('book.upload')->with('error', 'Немає даних для передперегляду.');
        }
    
        return view('preview', [
            'cover_image' => Storage::url($bookData['cover_image']),
            'title' => $bookData['title']
        ]);
    }
    
}
