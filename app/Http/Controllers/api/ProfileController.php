<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return response()->json([
            'success' => true,
            'data' => $profiles,
        ], 200);
    }

    public function show($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $profile,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $profile = Profile::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data profil berhasil ditambahkan.',
            'data' => $profile,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile tidak ditemukan.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $profile->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Halaman berhasil diperbarui.',
            'data' => $profile,
        ], 200);
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile tidak ditemukan.',
            ], 404);
        }

        try {
            $profile->delete();

            return response()->json([
                'success' => true,
                'message' => 'Halaman berhasil dihapus.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus profile: ' . $e->getMessage(),
            ], 500);
        }
    }
}
