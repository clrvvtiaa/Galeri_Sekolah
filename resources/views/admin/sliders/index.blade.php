@extends('admin.layout')

@section('title', 'Data Slider')

<style>
    /* Header tabel dengan gradasi */
    .table thead th {
        background: linear-gradient(45deg, #ff9a9e, #a18cd1);
        color: white;
        text-align: center;
        font-weight: bold;
    }

    /* Warna untuk baris tabel */
    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    /* Hover efek untuk baris tabel */
    .table tbody tr:hover {
        background-color: #ffe4e1;
    }

    /* Teks pada tabel */
    .table td {
        color: #34495e;
        vertical-align: middle;
    }

    /* Tombol aksi */
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.1);
    }
</style>

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Slider</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSliderModal">
            <i data-feather="plus" class="me-2"></i>Tambah Slider
        </button>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
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

        @if($sliders->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Alt Text</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($slider->image)
                                        <img src="{{ asset('storage/' . $slider->image) }}" 
                                             alt="{{ $slider->alt_text }}" 
                                             width="150"
                                             class="img-thumbnail">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->alt_text }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus slider ini?')">
                                                <i data-feather="trash-2" class="me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state text-center py-5">
                <i data-feather="image" size="48" class="mb-3"></i>
                <p>Tidak ada data slider</p>
            </div>
        @endif
    </div>
</div>

<!-- Modal Tambah Slider -->
<div class="modal fade" id="addSliderModal" tabindex="-1" aria-labelledby="addSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSliderModalLabel">Tambah Slider Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="alt_text" class="form-label">Alt Text</label>
                        <input type="text" class="form-control" id="alt_text" name="alt_text">
                        <small class="text-muted">Teks alternatif untuk gambar (SEO)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
