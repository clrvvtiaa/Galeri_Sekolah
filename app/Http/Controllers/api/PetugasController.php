<?php

namespace App\Http\Controllers\Api;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar petugas berhasil diambil',
            'data' => $petugas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas',
            'password' => 'required|min:6',
        ]);

        $petugas = Petugas::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Petugas berhasil ditambahkan',
            'data' => $petugas,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json([
                'success' => false,
                'message' => 'Petugas tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail petugas berhasil diambil',
            'data' => $petugas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json([
                'success' => false,
                'message' => 'Petugas tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $petugas->password,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Petugas berhasil diperbarui',
            'data' => $petugas,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json([
                'success' => false,
                'message' => 'Petugas tidak ditemukan',
            ], 404);
        }

        $petugas->delete();

        return response()->json([
            'success' => true,
            'message' => 'Petugas berhasil dihapus',
        ]);
    }
}
