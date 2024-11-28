<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Petugas;
use App\Models\Post;

class DashboardController extends Controller
{
    public function dashboard()
{
    $totalPetugas = Petugas::count(); // Ganti dengan model yang sesuai
    $totalPost = Post::count(); // Ganti dengan model yang sesuai
    $totalCategory = Category::count(); // Ganti dengan model yang sesuai

    // Debugging
    dd($totalPetugas, $totalPost, $totalCategory); // Ini akan menghentikan eksekusi dan menampilkan nilai

    return view('admin.dashboard', compact('totalPetugas', 'totalPost', 'totalCategory'));
}
}

