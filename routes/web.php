<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KontenBerandaController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route untuk memanggil galeri
Route::get('/daftar-gambar', [HomeController::class, 'galeri'])->name('galeri');
// Route untuk menampilkan profie
Route::get('/profil', [ProfileController::class, 'profil'])->name('profil');
// Route untuk memanggil jurusan
Route::get('/jurusan', [HomeController::class, 'index'])->name('jurusan');
// Route untuk memanggil agenda
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');
// Route untuk memanggil jurusan
Route::get('/jurusans/public', [JurusanController::class, 'indexPublic'])->name('jurusans.public');
// Route untuk memanggil informasi
Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');



// Halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
// Route Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Route yang membutuhkan autentikasi
Route::middleware('auth')->group(function(){
    // Dashboard admin
    Route::get('/admin', function(){
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
        ]);
    })->name('admin.dashboard'); 

    // Manajemen Petugas
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/create', [PetugasController::class, 'create']);
    Route::post('/petugas', [PetugasController::class, 'store']);
    Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit']);
    Route::put('/petugas/{id}', [PetugasController::class, 'update']);
    Route::delete('/petugas/{id}', [PetugasController::class, 'destroy']);
    //Route CRUD category
    Route::resource('categories', CategoryController::class);
    //Route POSTS
    Route::resource('posts', PostController::class);
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //Route GALLERY
    Route::resource('galleries', GalleryController::class);
    //Route foto yg di upload
    Route::post('/images/store', [ImageController::class, 'store']);
    //Route untuk menghapus foto
    Route::delete('/images/{id}', [ImageController::class, 'destroy']);
    //Route untuk profile
    Route::resource('profiles', ProfileController::class);
    Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
   // Route Jurusan
   Route::resource('jurusan', JurusanController::class);
   //Route Konten beranda
   
       Route::get('/konten-beranda', [KontenBerandaController::class, 'index'])->name('admin.konten-beranda.index');
       Route::get('/konten-beranda/create', [KontenBerandaController::class, 'create'])->name('admin.konten-beranda.create');
       Route::post('/konten-beranda', [KontenBerandaController::class, 'store'])->name('admin.konten-beranda.store');
       Route::get('/konten-beranda/{id}/edit', [KontenBerandaController::class, 'edit'])->name('admin.konten-beranda.edit');
       Route::put('/konten-beranda/{id}', [KontenBerandaController::class, 'update'])->name('admin.konten-beranda.update');
       Route::delete('/konten-beranda/{id}', [KontenBerandaController::class, 'destroy'])->name('admin.konten-beranda.destroy');
    //Route Map
    Route::get('/admin/map', [MapController::class, 'index'])->name('map.index');
    Route::put('/admin/map/{map}', [MapController::class, 'update'])->name('map.update');
    //Route Slider
    Route::resource('sliders', SliderController::class)->middleware(['auth'])->names([
        'index' => 'admin.sliders.index',
        'store' => 'admin.sliders.store',
        'destroy' => 'admin.sliders.destroy',
    ]);
});


    

