<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Method untuk login
     */
    public function login(Request $request)
    {
        // Validasi request
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cari petugas berdasarkan email
        $petugas = DB::table('petugas')->where('email', $validateData['email'])->first();

        // Jika petugas ditemukan dan password sesuai
        if ($petugas && Hash::check($validateData['password'], $petugas->password)) {

            // Generate token untuk API
            $token = $petugas->createToken('YourAppName')->plainTextToken;

            // Return response dengan token
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ]
            ]);
        }

        // Jika gagal, kirim pesan error
        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah'
        ], 401);
    }

    /**
     * Method untuk logout
     */
    public function logout(Request $request)
    {
        // Revoke token yang sedang digunakan
        Auth::user()->tokens->each(function ($token) {
            $token->delete();
        });

        // Kembalikan response sukses logout
        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    }
}
