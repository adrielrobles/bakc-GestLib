<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\LibrarySection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 1; 
        $pageNumber = $request->input('page', 1); 
    
        $librarySections = LibrarySection::where('available_copies', '>', 0)
            ->when($request->has('category_id'), function ($query) use ($request) {
                $query->whereHas('book', function ($query) use ($request) {
                    $query->where('category_id', $request->input('category_id'));
                });
            })
            ->with(['book.category', 'typeCopy']) 
            ->join('books', 'library_sections.book_id', '=', 'books.id')
            ->orderBy('books.release_date')
            ->orderBy('books.title')
            ->select('library_sections.*')
            ->paginate($perPage, ['*'], 'page', $pageNumber); 
    
        return response()->json($librarySections);
    }
    
}
