<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KontenBeranda;
use Illuminate\Http\Request;

class KontenBerandaController extends Controller
{
    public function index()
    {
        $kontens = KontenBeranda::all();
        return view('admin.konten-beranda.index', compact('kontens'));
    }

    public function create()
    {
        return view('admin.konten-beranda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi',
            'subjudul.required' => 'Subjudul harus diisi',
        ]);

        KontenBeranda::create($request->all());
        return redirect()->route('admin.konten-beranda.index')
            ->with('success', 'Konten beranda berhasil ditambahkan');
    }

    public function edit($id)
    {
        $konten = KontenBeranda::findOrFail($id);
        return view('admin.konten-beranda.edit', compact('konten'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string|max:255',
        ]);

        $konten = KontenBeranda::findOrFail($id);
        $konten->update($request->only(['judul', 'subjudul']));

        return redirect()
            ->route('admin.konten-beranda.index')
            ->with('success', 'Konten beranda berhasil diperbarui');
    }

    public function destroy(KontenBeranda $kontenBeranda)
    {
        $kontenBeranda->delete();
        return redirect()->route('admin.konten-beranda.index')
            ->with('success', 'Konten beranda berhasil dihapus');
    }
}
