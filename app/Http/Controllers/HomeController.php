<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('home', compact('sliders', 'kontens', 'map'));
    }

    public function galeri()
    {
        $galleries = DB::table('images')
                      ->latest()
                      ->paginate(9);
        return view('galeri', compact('galleries'));
    }

    public function profil()
    {
        $profil = DB::table('profiles')->first();
        return view('profil', compact('profil'));
    }

    public function agenda()
    {
        $posts = Post::where('category_id', 2)->get();

        //Kirim data ke view
        return view('agenda', ['posts' => $posts]);
    }

    public function informasi()
    {
        // Ambil posts yang memiliki category_id = 10
        $posts = Post::where('category_id', 1)->get();

        // Kirim data ke view
        return view('informasi', compact('posts'));
    }


}
