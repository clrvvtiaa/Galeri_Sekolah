<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\API\PetugasController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\JurusanController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\API\KontenBerandaController;
use App\Http\Controllers\API\MapController;
use App\Http\Controllers\API\SliderController;

Route::get('sliders', [SliderController::class, 'index']);        // Get all sliders
Route::post('sliders', [SliderController::class, 'store']);       // Create a new slider
Route::delete('sliders/{id}', [SliderController::class, 'destroy']); // Delete a slider by ID

Route::get('map', [MapController::class, 'index']);       // Get the map data
Route::put('map', [MapController::class, 'update']);      // Update the map data

Route::get('konten-beranda', [KontenBerandaController::class, 'index']);       // Get all records
Route::post('konten-beranda', [KontenBerandaController::class, 'store']);      // Create new record
Route::get('konten-beranda/{id}', [KontenBerandaController::class, 'show']);   // Get specific record
Route::put('konten-beranda/{id}', [KontenBerandaController::class, 'update']); // Update specific record
Route::delete('konten-beranda/{id}', [KontenBerandaController::class, 'destroy']); // Delete specific record

Route::get('/categories', [CategoryController::class, 'index']); // Menampilkan semua kategori
Route::post('/categories', [CategoryController::class, 'store']); // Menambahkan kategori baru
Route::get('/categories/{id}', [CategoryController::class, 'show']); // Menampilkan detail kategori
Route::put('/categories/{id}', [CategoryController::class, 'update']); // Memperbarui kategori
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Menghapus kategori

Route::post('login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/jurusan', [JurusanController::class, 'store']);
Route::get('/jurusan/{id}', [JurusanController::class, 'show']);
Route::put('/jurusan/{id}', [JurusanController::class, 'update']);
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy']);


Route::get('/images', [ImageController::class, 'index']);
Route::post('/images', [ImageController::class, 'store']);
Route::delete('/images/{id}', [ImageController::class, 'destroy']);


Route::get('/profiles', [ProfileController::class, 'index']); // GET semua data
Route::get('/profiles/{id}', [ProfileController::class, 'show']); // GET detail data
Route::post('/profiles', [ProfileController::class, 'store']); // POST tambah data
Route::put('/profiles/{id}', [ProfileController::class, 'update']); // PUT update data
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']); // DELETE hapus data


Route::get('home', [HomeController::class, 'index']);          // Get home data
Route::get('galeri', [HomeController::class, 'galeri']);       // Get gallery data
Route::get('profil', [HomeController::class, 'profil']);       // Get profile data
Route::get('agenda', [HomeController::class, 'agenda']);       // Get agenda data
Route::get('informasi', [HomeController::class, 'informasi']); // Get information data


Route::get('/petugas', [PetugasController::class, 'index']);
Route::post('/petugas', [PetugasController::class, 'store']);
Route::get('/petugas/{id}', [PetugasController::class, 'show']);
Route::put('/petugas/{id}', [PetugasController::class, 'update']);
Route::delete('/petugas/{id}', [PetugasController::class, 'destroy']);

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);


Route::get('/galleries', [GalleryController::class, 'index']);
Route::post('/galleries', [GalleryController::class, 'store']);
Route::get('/galleries/{id}', [GalleryController::class, 'show']);
Route::put('/galleries/{id}', [GalleryController::class, 'update']);
Route::delete('/galleries/{id}', [GalleryController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
