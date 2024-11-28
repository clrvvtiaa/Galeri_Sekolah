@extends('layouts.main')

@section('title', 'Jurusan')

@section('content')
    <div class="container-fluid mt-5">
        <div class="text-center mb-4">
            <h5 class="text-primary mb-2" style="font-size: 1.1rem; text-transform: uppercase; letter-spacing: 2px;">Program Keahlian</h5>
            <h2 class="fw-bold">Daftar Jurusan</h2>
            <div class="d-flex justify-content-center">
                <div class="separator bg-primary" style="width: 50px; height: 3px; border-radius: 3px;"></div>
            </div>
        </div>

        <div class="row flex-nowrap overflow-auto px-3">
            @foreach($jurusans as $jurusan)
                <div class="col-md-4 col-lg-3 mb-4" style="min-width: 250px;">
                    <div class="card h-100 shadow-sm hover-card">
                        @if($jurusan->gambar)
                            <div class="card-img-wrapper">
                                <img src="{{ asset('storage/' . $jurusan->gambar) }}" 
                                     class="card-img-top" 
                                     alt="{{ $jurusan->judul }}"
                                     style="aspect-ratio: 16/9;">
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary" style="font-size: 1rem;">{{ $jurusan->judul }}</h5>
                            <p class="card-text text-muted" style="font-size: 0.9rem;">{{ Str::limit($jurusan->deskripsi, 80, '...') }}</p>
                            <div class="mt-auto text-center">
                            <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 hover-button" data-bs-toggle="modal" data-bs-target="#jurusanModal{{ $jurusan->id }}">
    <i class="fas fa-info-circle me-1"></i>Baca Selengkapnya
</button>

</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Animasi untuk card */
        .hover-card {
            transition: all 0.3s ease;
            border: none;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        }

        /* Animasi untuk gambar */
        .card-img-wrapper {
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .card-img-wrapper img {
            width: 100%;
            object-fit: contain;
            background-color: #f8f9fa;
            padding: 5px;
            aspect-ratio: 16/9;
            transition: transform 0.3s ease;
        }

        .hover-card:hover .card-img-wrapper img {
            transform: scale(1.05);
        }

        /* Animasi untuk tombol */
        .hover-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .hover-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,123,255,0.4);
        }

        .hover-button:active {
            transform: translateY(0);
        }

        /* Animasi untuk modal */
        .modal.fade .modal-dialog {
            transform: scale(0.8);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }

        /* Styling scrollbar */
        .row.flex-nowrap {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
            padding-bottom: 15px;
        }

        .row.flex-nowrap::-webkit-scrollbar {
            height: 8px;
        }

        .row.flex-nowrap::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .row.flex-nowrap::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        .row.flex-nowrap::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Animasi loading untuk gambar */
        .card-img-wrapper img {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Efek ripple untuk tombol */
        .hover-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s ease, height 0.3s ease;
        }

        .hover-button:active::after {
            width: 200px;
            height: 200px;
            opacity: 0;
        }
    </style>

    <!-- Tambahkan Modal untuk setiap jurusan -->
@foreach($jurusans as $jurusan)
<div class="modal fade" id="jurusanModal{{ $jurusan->id }}" tabindex="-1" aria-labelledby="jurusanModalLabel{{ $jurusan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="jurusanModalLabel{{ $jurusan->id }}">{{ $jurusan->judul }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($jurusan->gambar)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $jurusan->gambar) }}" 
                             class="img-fluid rounded" 
                             alt="{{ $jurusan->judul }}"
                             style="max-height: 300px; width: auto;">
                    </div>
                @endif
                <p class="mt-3">{{ $jurusan->deskripsi }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection