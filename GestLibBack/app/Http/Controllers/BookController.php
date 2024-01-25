<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::whereHas('librarySections', function ($query) {
            $query->where('available_copies', '>', 0);
        })
        ->with(['librarySections' => function ($query) {
            $query->where('available_copies', '>', 0)
                ->with('book', 'typeCopy');
        }])
        ->when($request->has('category_id'), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->input('category_id'));
            });
        })
        ->orderBy('release_date')
        ->orderBy('title')
        ->paginate(10); 
        return response()->json($books);
    }
}
