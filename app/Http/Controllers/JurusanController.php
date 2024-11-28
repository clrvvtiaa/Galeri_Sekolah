<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.jurusan.index', [
            'jurusans' => $jurusans
        ]);
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('jurusan', $filename, 'public');
            $validatedData['gambar'] = $path;
        }

        Jurusan::create($validatedData);
        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($jurusan->gambar) {
                Storage::delete('public/' . $jurusan->gambar);
            }
            
            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('public/jurusan', $filename);
            // Simpan path tanpa 'public/'
            $validatedData['gambar'] = 'jurusan/' . $filename;
        }

        $jurusan->update($validatedData);
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil diperbarui');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar) {
            Storage::disk('public')->delete($jurusan->gambar);
        }
        $jurusan->delete();
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil dihapus');
    }

    public function show(Jurusan $jurusan)
    {
        return view('admin.jurusan.show', compact('jurusan'));
    }

    public function indexPublic()
    {
        $jurusans = Jurusan::all();
        return view('jurusans', [
            'title' => 'Jurusan',
            'jurusans' => $jurusans
        ]);
    }
}