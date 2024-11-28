<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'message' => 'Data kategori berhasil diambil',
            'data' => $categories,
        ]);
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
        ]);

        // Simpan kategori baru
        $category = Category::create([
            'title' => $request->title,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $category,
        ]);
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail kategori berhasil diambil',
            'data' => $category,
        ]);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
        ]);

        // Update kategori
        $category->update([
            'title' => $request->title,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diperbarui',
            'data' => $category,
        ]);
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}
