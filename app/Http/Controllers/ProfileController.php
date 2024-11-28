<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('admin.profiles.index', compact('profiles'));
    }

    // Method terpisah untuk halaman profil publik
    public function profil()
    {
        $profiles = Profile::all();  // Ambil semua data
        // atau
        // $profiles = Profile::first();  // Jika hanya butuh satu data
        
        return view('profile', [
            'profiles' => $profiles
        ]);
    }

    public function create()
    {
        return view('admin.profiles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Profile::create([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        return redirect()->route('profiles.index')
                        ->with('success', 'Data profil berhasil ditambahkan!');
    }

    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $profile->update($validated);
        return redirect()->route('profiles.index')->with('success', 'Halaman berhasil diupdate.');
    }

    public function destroy(Profile $profile)
{
    try {
        if (!$profile->exists) {
            return redirect()->route('profiles.index')->with('error', 'Profile tidak ditemukan.');
        }
        
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Halaman berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->route('profiles.index')->with('error', 'Gagal menghapus profile: ' . $e->getMessage());
    }
}
}