@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Jurusan</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul Jurusan</label>
                                <input type="text" 
                                    class="form-control @error('judul') is-invalid @enderror" 
                                    id="judul" 
                                    name="judul" 
                                    value="{{ old('judul', $jurusan->judul) }}"
                                    required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                @if($jurusan->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $jurusan->gambar) }}" 
                                            alt="Current Image" 
                                            class="img-fluid" 
                                            style="max-height: 200px">
                                    </div>
                                @endif
                                <input type="file" 
                                    class="form-control @error('gambar') is-invalid @enderror" 
                                    id="gambar" 
                                    name="gambar">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                    id="deskripsi" 
                                    name="deskripsi" 
                                    rows="5"
                                    required>{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <a href="{{ route('jurusan.index') }}" class="btn btn-dark">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection