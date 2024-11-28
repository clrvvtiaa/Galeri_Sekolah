@extends('admin.layout')

@section('title', 'Daftar galleries')

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

    <h1 class="mb-4">Daftar galleries</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/galleries/create') }}" class="btn btn-primary mb-3">+ Gallery</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $index => $galleryItem)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $galleryItem->post->title }}</td>
                    <td>{{ $galleryItem->position }}</td>
                    <td>
                    @if ($galleryItem->status == 'aktif')
                                <span class="badge bg-success">{{ Str::ucfirst($galleryItem->status) }}</span>
                                @else
                                <span class="badge bg-warning">{{ Str::ucfirst($galleryItem->status) }}</span>
                                @endif
                    </td>
                    <td class="d-flex">
                        <a href="/galleries/{{ $galleryItem->id }}" class="btn btn-success btn-sm me-2 d-flex align-items-center">
                            <i data-feather="info" class="me-1"></i> Detail
                        </a>

                        <a href="{{ url('/galleries/' . $galleryItem->id . '/edit') }}" class="btn btn-warning btn-sm me-2 d-flex align-items-center">
                            <i data-feather="edit" class="me-1"></i> Edit
                        </a>

                        <form action="{{ url('/galleries/' . $galleryItem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center" onclick="return confirm('Yakin ingin menghapus galleries ini?')">
                                <i data-feather="trash-2" class="me-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($galleries->isEmpty())
        <p class="text-center">Belum ada galleries yang terdaftar.</p>
    @endif
@endsection
