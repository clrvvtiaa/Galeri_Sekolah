<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all galleries with their related post
        $galleries = Gallery::with('post')->get();

        // Return galleries as JSON response
        return response()->json([
            'success' => true,
            'data' => $galleries
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     * For API, we can return the data to create a gallery, like posts.
     */
    public function create()
    {
        // Get all posts (for selecting a post to attach to the gallery)
        $posts = Post::all();

        // Return posts as JSON response
        return response()->json([
            'success' => true,
            'data' => $posts
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive'
        ]);

        // Create a new gallery record
        $gallery = Gallery::create($validated);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Gallery created successfully',
            'data' => $gallery
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        // Return the gallery with the associated post
        return response()->json([
            'success' => true,
            'data' => $gallery->load('post')
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     * For API, this will return the gallery and its posts to be updated.
     */
    public function edit(Gallery $gallery)
    {
        // Get all posts
        $posts = Post::all();

        // Return gallery data along with possible posts to update
        return response()->json([
            'success' => true,
            'data' => [
                'gallery' => $gallery,
                'posts' => $posts
            ]
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|in:active,inactive'
        ]);

        // Update the gallery
        $gallery->update($validated);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Gallery updated successfully',
            'data' => $gallery
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete the gallery
        $gallery->delete();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Gallery deleted successfully'
        ], Response::HTTP_NO_CONTENT);
    }
}
