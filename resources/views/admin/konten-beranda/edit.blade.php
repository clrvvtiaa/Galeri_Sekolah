@extends('admin.layout')

@section('title', 'Edit Konten Beranda')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Edit Konten Beranda</h4>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.konten-beranda.update', $konten->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                       id="judul" name="judul" value="{{ old('judul', $konten->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subjudul" class="form-label">Subjudul</label>
                <input type="text" class="form-control @error('subjudul') is-invalid @enderror" 
                       id="subjudul" name="subjudul" value="{{ old('subjudul', $konten->subjudul) }}">
                @error('subjudul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i data-feather="save" class="me-1"></i>Simpan Perubahan
                </button>
                <a href="{{ route('admin.konten-beranda.index') }}" class="btn btn-secondary">
                    <i data-feather="x" class="me-1"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
