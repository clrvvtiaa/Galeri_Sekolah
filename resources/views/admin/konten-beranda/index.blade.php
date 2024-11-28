@extends('admin.layout')
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

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kelola Konten Beranda</h3>
            <div class="card-tools">
                <a href="{{ route('admin.konten-beranda.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Konten
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th>Subjudul</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontens as $konten)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $konten->judul }}</td>
                            <td>{{ $konten->subjudul }}</td>
                            <td>
                                <a href="{{ route('admin.konten-beranda.edit', $konten->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.konten-beranda.destroy', $konten->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection