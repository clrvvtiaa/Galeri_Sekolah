<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'nullable|string|max:255',
                'alt_text' => 'nullable|string|max:255'
            ]);

            if ($request->hasFile('image')) {
                // Dapatkan file
                $file = $request->file('image');
                
                // Buat nama file unik
                $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                
                // Simpan file ke storage/app/public/sliders
                $file->move(public_path('storage/sliders'), $filename);
                
                // Buat record di database
                Slider::create([
                    'image' => 'sliders/' . $filename, // Simpan path relatif
                    'title' => $request->title,
                    'alt_text' => $request->alt_text,
                    'order' => Slider::count() + 1
                ]);

                return redirect()->route('admin.sliders.index')
                    ->with('success', 'Slider berhasil ditambahkan');
            }

            return redirect()->route('admin.sliders.index')
                ->with('error', 'Tidak ada file yang diupload');

        } catch (\Exception $e) {
            return redirect()->route('admin.sliders.index')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(Slider $slider)
    {
        try {
            // Hapus file fisik
            $path = public_path('storage/' . $slider->image);
            if (file_exists($path)) {
                unlink($path);
            }

            // Hapus record database
            $slider->delete();

            return redirect()->route('admin.sliders.index')
                ->with('success', 'Slider berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.sliders.index')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
