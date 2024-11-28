<!-- resources/views/petugas/create.blade.php -->
@extends('admin.layout') <!-- Menggunakan layout utama aplikasi -->

@section('title', 'Tambah Categories') <!-- Menetapkan title halaman -->

@section('content')
<div class="mb-4 text-center">
    <h1 class="display-4">Tambah Categories</h1> <!-- Teks di luar card dengan ukuran besar -->
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="/categories" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-3 col-form-label">Judul</label>
                <div class="col-md-9">
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/petugas') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .card {
        border: 1px solid #007bff;
        border-radius: 0.25rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk kedalaman */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease; /* Animasi transisi */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .display-4 {
        margin-bottom: 20px;
        font-weight: 700; /* Berat font lebih tebal */
    }

    .lead {
        font-size: 1.25rem; /* Ukuran font yang lebih besar untuk teks penjelasan */
        margin-bottom: 20px; /* Jarak bawah */
    }

    .form-control {
        border-radius: 0.25rem; /* Radius sudut */
        transition: border-color 0.3s; /* Animasi transisi */
    }

    .form-control:focus {
        border-color: #007bff; /* Warna border saat fokus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Bayangan saat fokus */
    }
</style>
@endsection