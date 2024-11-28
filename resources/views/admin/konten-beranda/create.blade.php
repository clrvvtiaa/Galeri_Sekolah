@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Konten Beranda</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.konten-beranda.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           id="judul" 
                           name="judul" 
                           value="{{ old('judul') }}" 
                           required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subjudul">Subjudul</label>
                    <input type="text" 
                           class="form-control @error('subjudul') is-invalid @enderror" 
                           id="subjudul" 
                           name="subjudul" 
                           value="{{ old('subjudul') }}" 
                           required>
                    @error('subjudul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.konten-beranda.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
