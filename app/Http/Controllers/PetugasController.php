<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Petugas; // Pastikan model Petugas sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // Menampilkan daftar petugas
    public function index()
    {
        $petugas = Petugas::all(); // Ambil semua data petugas
        return view('admin.petugas.index', compact('petugas')); // Kirim data ke view
    }

    // Menampilkan form tambah petugas
    public function create()
    {
        return view('admin.petugas.create'); // Tampilkan form tambah petugas
    }

    // Menyimpan data petugas yang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas',
            'password' => 'required|min:6',
        ]);

        // Buat petugas baru
        Petugas::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ]);

        return redirect('/petugas')->with('success', 'Petugas berhasil ditambahkan'); // Redirect dengan pesan sukses
    }

    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id); // Cari petugas berdasarkan ID
        return view('admin.petugas.edit', compact('petugas')); // Tampilkan form edit dengan data petugas
    }

    // Menyimpan update petugas
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $id, // Pastikan email unik kecuali untuk petugas yang sedang diedit
        ]);

        $petugas = Petugas::findOrFail($id); // Cari petugas berdasarkan ID
        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
            // Hanya hash password jika ada yang diinputkan
            'password' => $request->password ? Hash::make($request->password) : $petugas->password,
        ]);

        return redirect('/petugas')->with('success', 'Petugas berhasil diperbarui'); // Redirect dengan pesan sukses
    }

    // Menghapus data petugas
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id); // Cari petugas berdasarkan ID
        $petugas->delete(); // Hapus petugas

        return redirect('/petugas')->with('success', 'Petugas berhasil dihapus'); // Redirect dengan pesan sukses
    }
}