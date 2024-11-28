<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Method untuk menampilkan form login
    public function showFormLogin()
{
    return view('auth.login');
}

    // Method untuk menangani proses login
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
            
            // Login menggunakan ID petugas
            Auth::loginUsingId($petugas->id);
            $request->session()->regenerate();

            // Redirect ke halaman admin setelah login berhasil
            return redirect()->intended('/admin');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->with('error', 'Email atau Password salah!');
    }

   // Method untuk logout
   public function logout(Request $request)
{
    Auth::logout(); // Pastikan menggunakan Auth::logout() secara eksplisit

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
    }