<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\LibrarySection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $librarySections = LibrarySection::where('available_copies', '>', 0)
        ->when($request->has('category_id'), function ($query) use ($request) {
            $query->whereHas('book.category', function ($query) use ($request) {
                $query->where('id', $request->input('category_id'));
            });
        })
        ->with(['book', 'typeCopy'])
        ->join('books', 'library_sections.book_id', '=', 'books.id')
        ->orderBy('books.release_date')
        ->orderBy('books.title')
        ->select('library_sections.*')
        ->paginate(10);
    
    return response()->json($librarySections);
    
    }
}
