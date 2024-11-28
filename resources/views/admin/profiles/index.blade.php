@extends('admin.layout')

@section('title', 'Daftar Profil')
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
    <h1 class="mb-4">Daftar Profil</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">+ Tambah Profil</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $index => $profile)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $profile->judul }}</td>
                    <td>{{ $profile->isi }}</td>
                    <td class="d-flex">
                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm me-2 d-flex align-items-center">
                            <i data-feather="edit" class="me-1"></i> Edit
                        </a>

                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center" onclick="return confirm('Yakin ingin menghapus profil ini?')">
                                <i data-feather="trash-2" class="me-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($profiles->isEmpty())
        <p class="text-center">Belum ada profil yang terdaftar.</p>
    @endif
@endsection