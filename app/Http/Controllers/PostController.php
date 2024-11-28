<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil semua data post
    $posts = Post::all();


    // Tampilkan halaman index dan kirim data post
    return view('admin.posts.index', [
        'posts' => $posts,
        'title' => 'Post',
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data category
        $categories = Category::all();

        // Tampilkan halaman create dan kirim data category 
        return view('admin.posts.create', [
            'categories' => $categories,
            'title' => 'Buat Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan data post baru
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id, 
            'petugas_id' => auth()->id(), //Ambil id petugas yg sedang login
            'status' => $request->status,
        ]);

        // Redirect ke halaman index post
        return redirect('/posts')->with('success', 'Post berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // ambil semua data category
        $categories = Category::all();

        // Tampilkan halaman edit dan kirim data post dan category
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'title' => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Update data post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        // redirect ke halaman index post
        return redirect('/posts')->with('success', 'post berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // hpus data post
        $post->delete();

        // Redirect ke halaman index post 
        return redirect('/posts')->with('success', 'Post berhasil di hapus');
    }
}