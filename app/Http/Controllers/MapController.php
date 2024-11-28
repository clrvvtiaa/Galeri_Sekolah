<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $map = Map::firstOrCreate(
            [], // empty condition
            [
                'embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.04983961244!2d106.82211897499403!3d-6.640733393353795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1731730399595!5m2!1sid!2sid',
                'google_maps_link' => 'https://maps.google.com/maps?q=SMKN+4+Bogor',
                'title' => 'Lokasi SMKN 4 Bogor'
            ]
        );
        
        return view('admin.map.index', compact('map'));
    }

    public function update(Request $request, Map $map)
    {
        $validated = $request->validate([
            'embed_url' => 'required|url',
            'google_maps_link' => 'required|url',
            'title' => 'nullable|string|max:255',
        ]);

        $map->update($validated);

        return redirect()->route('map.index')
            ->with('success', 'Peta berhasil diperbarui');
    }
}
