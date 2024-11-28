<?php

namespace App\Http\Controllers\Api;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    /**
     * Get all jurusan data
     */
    public function index()
    {
        $jurusans = Jurusan::all();

        return response()->json([
            'success' => true,
            'message' => 'Data jurusan berhasil diambil',
            'data' => $jurusans,
        ]);
    }

    /**
     * Store new jurusan
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('jurusan', $filename, 'public');
            $validatedData['gambar'] = $path;
        }

        $jurusan = Jurusan::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Jurusan berhasil ditambahkan',
            'data' => $jurusan,
        ]);
    }

    /**
     * Show jurusan detail
     */
    public function show($id)
    {
        $jurusan = Jurusan::find($id);

        if (!$jurusan) {
            return response()->json([
                'success' => false,
                'message' => 'Jurusan tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data jurusan berhasil diambil',
            'data' => $jurusan,
        ]);
    }

    /**
     * Update jurusan
     */
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);

        if (!$jurusan) {
            return response()->json([
                'success' => false,
                'message' => 'Jurusan tidak ditemukan',
            ], 404);
        }

        $validatedData = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($jurusan->gambar) {
                Storage::delete('public/' . $jurusan->gambar);
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('jurusan', $filename, 'public');
            $validatedData['gambar'] = $path;
        }

        $jurusan->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Jurusan berhasil diperbarui',
            'data' => $jurusan,
        ]);
    }

    /**
     * Delete jurusan
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);

        if (!$jurusan) {
            return response()->json([
                'success' => false,
                'message' => 'Jurusan tidak ditemukan',
            ], 404);
        }

        if ($jurusan->gambar) {
            Storage::disk('public')->delete($jurusan->gambar);
        }

        $jurusan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jurusan berhasil dihapus',
        ]);
    }
}
