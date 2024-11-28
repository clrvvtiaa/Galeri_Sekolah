<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Store a new image.
     */
    public function store(Request $request)
    {
        // Validasi data request
        $request->validate([
            'gallery_id' => 'required|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required|string|max:255',
        ]);

        // Ambil file yang di-upload
        $file = $request->file('file');

        // Nama file unik
        $fileName = time() . '.' . $file->extension();

        // Pindahkan file ke folder public/images
        $file->move(public_path('images'), $fileName);

        // Simpan data ke database
        $image = Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $fileName,
            'title' => $request->title,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Foto berhasil ditambahkan',
            'data' => $image,
        ], 201);
    }

    /**
     * Delete an image.
     */
    public function destroy($id)
    {
        // Ambil data image berdasarkan ID
        $image = Image::find($id);

        if (!$image) {
            return response()->json([
                'success' => false,
                'message' => 'Foto tidak ditemukan',
            ], 404);
        }

        // Hapus file dari folder public/images
        if (file_exists(public_path('images/' . $image->file))) {
            unlink(public_path('images/' . $image->file));
        }

        // Hapus data dari database
        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Foto berhasil dihapus',
        ], 200);
    }
}
