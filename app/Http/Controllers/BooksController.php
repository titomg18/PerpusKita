<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Book::with('category');

        if ($search) {
            $query->search($search);
        }

        if ($category) {
            $query->whereHas('category', function($q) use ($category) {
                $q->where('name', $category);
            });
        }

        $perPage = (int) $request->query('per_page', 10);
        $perPage = in_array($perPage, [10,25,50,100]) ? $perPage : 10;
        $books = $query->orderBy('title')->paginate($perPage)->withQueryString();

        $categories = Category::orderBy('name')->get();

        $counts = [
            'total' => Book::count(),
            'available' => Book::where('stock', '>', 0)->count(),
            'borrowed' => Loan::where('status', 'dipinjam')->count(),
            'missing' => 0,
        ];

        return view('books', compact('books', 'categories', 'counts', 'search', 'category'));
    }
}
