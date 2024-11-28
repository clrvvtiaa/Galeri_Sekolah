@extends('admin.layout')

@section('title', 'Edit Petugas')

<style>
    /* Form styling */
    .form-control {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        padding: 0.375rem 0.75rem;
    }

    .form-control:focus {
        border-color: #42a5f5;
        box-shadow: 0 0 0 0.2rem rgba(66, 165, 245, 0.25);
    }

    /* Card styling */
    .card {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #e3f2fd;
        color: #0d6efd;
        font-weight: bold;
        border-bottom: 1px solid #dee2e6;
    }

    /* Button styling */
    .btn-primary {
        background-color: #42a5f5;
        border-color: #42a5f5;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1e88e5;
        border-color: #1e88e5;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Petugas</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/petugas/' . $petugas->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name', $petugas->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" value="{{ old('email', $petugas->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                    id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" 
                                    id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/petugas') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection