<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data galeri
        $galleries = Gallery::all();

        // tampilkan view index untuk semua data gallery
        return view('admin.galleries.index', [
            'title' => 'Galeri Foto',
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil semua data post
        $posts = Post::all();

        // tampilkan view form tambah gallery
        return view('admin.galleries.create', [
            'title' => 'Tambah Galeri Foto',
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // simpan data galeri yang baru
        Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        // redirect ke halaman index galeri
        return redirect('/galleries')->with('success', 'Galeri foto berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        // Tampilkan view data galeri
        return view('admin.galleries.show', [
            'title' => 'Detail galeri foto',
            'gallery' => $gallery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        // ambil semua data post
        $posts = Post::all();

        // tampilkan view form edit galeri
        return view('admin.galleries.edit', [
            'title' => 'Edit galeri foto',
            'gallery' => $gallery,
            'posts' => $posts,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        // Update data galeri
        $gallery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        // redirect ke halaman index galeri
        return redirect('/galleries')->with('success', 'Galeri foto berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // hapus data galeri
        $gallery->delete();

        // redirect ke halaman index galeri dengan pesan sukses
        return redirect('/galleries')->with('success', 'Galeri foto berhasil dihapus');
    }
}