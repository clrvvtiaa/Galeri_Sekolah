<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KontenBeranda;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KontenBerandaController extends Controller
{
    public function index()
    {
        $kontens = KontenBeranda::all();
        return response()->json([
            'success' => true,
            'data' => $kontens,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string|max:255',
        ]);

        $konten = KontenBeranda::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Konten beranda berhasil ditambahkan',
            'data' => $konten,
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $konten = KontenBeranda::find($id);

        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $konten,
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string|max:255',
        ]);

        $konten = KontenBeranda::find($id);

        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $konten->update($request->only(['judul', 'subjudul']));

        return response()->json([
            'success' => true,
            'message' => 'Konten beranda berhasil diperbarui',
            'data' => $konten,
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $konten = KontenBeranda::find($id);

        if (!$konten) {
            return response()->json([
                'success' => false,
                'message' => 'Konten tidak ditemukan',
            ], Response::HTTP_NOT_FOUND);
        }

        $konten->delete();

        return response()->json([
            'success' => true,
            'message' => 'Konten beranda berhasil dihapus',
        ], Response::HTTP_OK);
    }
}
