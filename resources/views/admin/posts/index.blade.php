@extends('admin.layout')

@section('title', 'Daftar posts')

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

    <h1 class="mb-4">Daftar Post</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/posts/create') }}" class="btn btn-primary mb-3">+ Post</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $postItem)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $postItem->title }}</td>
                    <td>{{ $postItem->category->title }}</td>
                    <td>{{ $postItem->petugas->name }}</td>
                    <td>
                        @if (Str::lower($postItem->status) == 'publish')
                            <span class="badge bg-success text-white">{{ Str::ucfirst($postItem->status) }}</span>
                        @else
                            <span class="badge bg-warning text-white">{{ Str::ucfirst($postItem->status) }}</span>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="#" class="btn btn-info btn-sm me-2 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#postDetail{{ $postItem->id }}" style="width: 40px; height: 40px;">
                            <i data-feather="info"></i>
                        </a>
                        <a href="{{ url('/posts/' . $postItem->id . '/edit') }}" class="btn btn-warning btn-sm me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{ url('/posts/' . $postItem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" onclick="return confirm('Yakin ingin menghapus post ini?')">
                                <i data-feather="trash-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($posts as $post)
    <!-- Modal Post -->
    <div class="modal fade" id="postDetail{{ $post->id }}" tabindex="-1" aria-labelledby="postDetail{{ $post->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="postDetail{{ $post->id }}Label"><i data-feather="info"></i> Detail Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Dibuat</td>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td>Dibuat Oleh</td>
                            <td>:</td>
                            <td>{{ $post->petugas->name }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>{{ Str::ucfirst($post->status) }}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>{{ $post->category->title }}</td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td>:</td>
                            <td>{{ $post->content }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @if($posts->isEmpty())
        <p class="text-center">Belum ada posts yang terdaftar.</p>
    @endif
@endsection
