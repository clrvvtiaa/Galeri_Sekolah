@extends('admin.layout')

@section('title', 'Daftar Petugas')

@section('content')
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

    <h1 class="mb-4">Daftar Petugas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/petugas/create') }}" class="btn btn-primary mb-3">Tambah Petugas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $index => $petugasItem) <!-- Ubah dari $users ke $petugas -->
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $petugasItem->name }}</td>
                    <td>{{ $petugasItem->email }}</td>
                    <td>
                        <a href="{{ url('/petugas/' . $petugasItem->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/petugas/' . $petugasItem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus petugas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($petugas->isEmpty())
        <p class="text-center">Belum ada petugas yang terdaftar.</p>
    @endif
@endsection