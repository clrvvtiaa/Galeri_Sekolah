@extends('admin.layout')

@section('title', 'Data Jurusan')

<style>
    /* Header tabel dengan gradasi */
    .table thead th {
        background: linear-gradient(45deg, #ff9a9e, #a18cd1); /* Gradasi pink ke biru */
        color: white;
        text-align: center;
        font-weight: bold;
    }

    /* Warna untuk baris tabel */
    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9; /* Warna abu-abu muda */
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff; /* Warna putih */
    }

    /* Hover efek untuk baris tabel */
    .table tbody tr:hover {
        background-color: #ffe4e1; /* Warna merah muda lembut */
    }

    /* Teks pada tabel */
    .table td {
        color: #34495e; /* Warna teks */
        vertical-align: middle; /* Menengah teks secara vertikal */
    }

    /* Tombol aksi */
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.1); /* Efek zoom saat hover */
    }
</style>


@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Jurusan</h4>
        <a href="{{ route('jurusan.create') }}" class="btn btn-primary">
            <i data-feather="plus" class="me-2"></i>Tambah Data
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($jurusans->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurusans as $jurusan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jurusan->judul }}</td>
                                <td>
                                    @if($jurusan->gambar)
                                        <img src="{{ asset('storage/' . $jurusan->gambar) }}" 
                                             alt="Gambar Jurusan" 
                                             width="100"
                                             class="img-thumbnail">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ Str::limit($jurusan->deskripsi, 100) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('jurusan.show', $jurusan->id) }}" class="btn btn-info btn-sm">
                                            <i data-feather="eye" class="me-1"></i>Detail
                                        </a>
                                        <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm">
                                            <i data-feather="edit-2" class="me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i data-feather="trash" class="me-1"></i>Hapus
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
            <div class="empty-state">
                <i data-feather="inbox" size="48" class="mb-3"></i>
                <p>Tidak ada data jurusan</p>
            </div>
        @endif
    </div>
</div>
@endsection