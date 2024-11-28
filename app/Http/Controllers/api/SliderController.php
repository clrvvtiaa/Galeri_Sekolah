<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();

        return response()->json([
            'success' => true,
            'data' => $sliders,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'nullable|string|max:255',
                'alt_text' => 'nullable|string|max:255',
            ]);

            if ($request->hasFile('image')) {
                // Simpan file
                $file = $request->file('image');
                $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                $filePath = $file->storeAs('sliders', $filename, 'public');

                // Simpan data ke database
                $slider = Slider::create([
                    'image' => $filePath,
                    'title' => $request->title,
                    'alt_text' => $request->alt_text,
                    'order' => Slider::count() + 1,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Slider berhasil ditambahkan',
                    'data' => $slider,
                ], 201);
            }

            return response()->json([
                'success' => false,
                'message' => 'Tidak ada file yang diupload',
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);

            if (!$slider) {
                return response()->json([
                    'success' => false,
                    'message' => 'Slider tidak ditemukan',
                ], 404);
            }

            // Hapus file fisik
            if (Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            // Hapus data dari database
            $slider->delete();

            return response()->json([
                'success' => true,
                'message' => 'Slider berhasil dihapus',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
