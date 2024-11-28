<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'petugas')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar post berhasil diambil',
            'data' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'petugas_id' => auth()->id(), // ID petugas yang sedang login
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil ditambahkan',
            'data' => $post,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail post berhasil diambil',
            'data' => $post->load('category', 'petugas'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil diperbarui',
            'data' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dihapus',
        ]);
    }
}
