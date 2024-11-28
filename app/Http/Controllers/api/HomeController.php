<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Agenda;
use Illuminate\Support\Facades\DB;
use App\Models\KontenBeranda;
use App\Models\Slider;
use App\Models\Map;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        $kontens = KontenBeranda::all();
        $map = Map::first();

        return response()->json([
            'success' => true,
            'data' => [
                'sliders' => $sliders,
                'kontens' => $kontens,
                'map' => $map,
            ],
        ], 200);
    }

    public function galeri()
    {
        $galleries = DB::table('images')
            ->latest()
            ->paginate(9);

        return response()->json([
            'success' => true,
            'data' => $galleries,
        ], 200);
    }

    public function profil()
    {
        $profil = DB::table('profiles')->first();

        if (!$profil) {
            return response()->json([
                'success' => false,
                'message' => 'Profil tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $profil,
        ], 200);
    }

    public function agenda()
    {
        $posts = Post::where('category_id', 2)->get();

        return response()->json([
            'success' => true,
            'data' => $posts,
        ], 200);
    }

    public function informasi()
    {
        $posts = Post::where('category_id', 1)->get();

        return response()->json([
            'success' => true,
            'data' => $posts,
        ], 200);
    }
}
