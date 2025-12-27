<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\Category::latest()->paginate(10);
        $totalCategories = \App\Models\Category::count();
        
        return view('admin.categories', compact('categories', 'totalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $totalCategories = \App\Models\Category::count();
        return view('admin.categories', compact('totalCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        \App\Models\Category::create($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        $totalCategories = \App\Models\Category::count();
        return view('admin.categories', compact('category', 'totalCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = \App\Models\Category::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        
        // Jika nanti ada relasi dengan buku, tambahkan pengecekan disini
        // if ($category->books()->exists()) {
        //     return redirect()->route('admin.categories.index')
        //         ->with('error', 'Tidak dapat menghapus kategori karena masih memiliki buku!');
        // }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }

    /**
     * Get categories for API (for dropdown, etc.)
     */
    public function getCategories(Request $request)
    {
        $search = $request->get('search');
        
        $categories = \App\Models\Category::when($search, function($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%");
        })
        ->limit(10)
        ->get();

        return response()->json($categories);
    }
}