<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data galeri dengan relasi post
        $galleries = Gallery::with('post')->get();

        return response()->json([
            'success' => true,
            'message' => 'List of galleries',
            'data' => $galleries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Simpan data galeri baru
        $gallery = Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery created successfully',
            'data' => $gallery,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gallery = Gallery::with('post')->find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Gallery details',
            'data' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
            ], 404);
        }

        // Update data galeri
        $gallery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery updated successfully',
            'data' => $gallery,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
            ], 404);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery deleted successfully',
        ]);
    }
}