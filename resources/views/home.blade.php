@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<div class="hero-section position-relative">
    <!-- Slide container -->
    <div class="carousel-container">
        <div class="carousel">
            <button class="carousel-button prev" onclick="moveSlide(-1)">❮</button>
            <button class="carousel-button next" onclick="moveSlide(1)">❯</button>
            
            <div class="slides">
                @if(isset($sliders))
                    @forelse($sliders as $slider)
                        <div class="slide">
                            <img src="{{ asset('storage/'.$slider->image) }}" alt="{{ $slider->alt_text }}">
                        </div>
                    @empty
                        <div class="slide">
                            <img src="{{ asset('assets/images/default.jpg') }}" alt="Default Image">
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>

    <!-- Konten hero tetap di atas slider -->
    <div class="container hero-content">
        <div class="row min-vh-100 align-items-center">
            <div class="d-flex justify-content-center align-items-center text-white">
                <div class="text-center">
                    @if(isset($kontens) && $kontens->isNotEmpty())
                        @foreach($kontens as $konten)
                            <h1 class="display-4 fw-bold custom-font text-shadow">{{ $konten->judul }}</h1>
                            <p class="lead mb-4 custom-font text-shadow">{{ $konten->subjudul }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Highlight Section -->
<div class="container py-5">
    <div class="row g-4">

        <!-- Baris Pertama -->
        <div class="col-md-6">
            <a href="{{ route('jurusans.public') }}" class="text-decoration-none">
                <div id="jurusan" class="card h-100 border-0 shadow-sm gradient-card">
                    <div class="card-body text-center">
                        <i class="fas fa-graduation-cap fa-3x text-light mb-3"></i>
                        <h4>Jurusan</h4>
                        <p>Jurusan SMKN 4 BOGOR</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('galeri') }}" class="text-decoration-none">
                <div id="galeri" class="card h-100 border-0 shadow-sm gradient-card">
                    <div class="card-body text-center">
                        <i class="fas fa-camera fa-3x text-light mb-3"></i>
                        <h4>Galeri Sekolah</h4>
                        <p>Fasilitas Sekolah</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Baris Kedua -->
        <div class="col-md-6">
            <a href="{{ route('agenda') }}" class="text-decoration-none">
                <div id="agenda" class="card h-100 border-0 shadow-sm gradient-card">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-3x text-light mb-3"></i>
                        <h4>Agenda</h4>
                        <p>Agenda & Kegiatan Sekolah</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('informasi') }}" class="text-decoration-none">
                <div id="informasi" class="card h-100 border-0 shadow-sm gradient-card">
                    <div class="card-body text-center">
                        <i class="fas fa-info-circle fa-3x text-light mb-3"></i>
                        <h4>Informasi</h4>
                        <p>Informasi Sekolah</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- Map Section -->
@if($map = App\Models\Map::first())
<div id="peta" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">{{ $map->title ?? 'Lokasi Kami' }}</h2>
        <div class="row">
            <div class="col-12">
                <div class="map-container shadow-sm rounded">
                    <iframe 
                        src="{{ $map->embed_url }}"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ $map->google_maps_link }}" 
                       class="btn btn-primary" 
                       target="_blank">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- CSS untuk slideshow -->
<style>
/* Kartu dengan warna gradasi */
.gradient-card {
    background: linear-gradient(135deg, #ff9a9e, #a18cd1); /* Gradasi pink ke biru */
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    border-radius: 15px; /* Membuat sudut kartu melengkung */
    color: white;
}

/* Hover Animasi */
.gradient-card:hover {
    transform: translateY(-10px); /* Efek terangkat */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar */
    background: linear-gradient(135deg, #ff758c, #7386d5); /* Warna gradasi berubah saat hover */
}

/* Warna Ikon dan Teks */
.gradient-card i {
    color: #ffffff; /* Putih sebagai default */
    transition: color 0.3s ease;
}

.gradient-card:hover i {
    color: #ffe600; /* Warna kuning saat hover */
}

.gradient-card h4,
.gradient-card p {
    transition: color 0.3s ease;
}

.gradient-card:hover h4,
.gradient-card:hover p {
    color: #fff; /* Teks tetap putih tetapi transisi untuk memastikan kelihatan halus */
}


.hero-section {
    height: 100vh;
    overflow: hidden;
}

.carousel-container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

.carousel {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: 100%;
    height: 100%;
}

.slide {
    min-width: 100%;
    flex-shrink: 0;
    position: relative;
}

.slide img {
    width: 100%;
    height: 100vh;
    object-fit: cover;
}

.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.3);
    color: white;
    padding: 16px;
    border: none;
    cursor: pointer;
    font-size: 18px;
    z-index: 5;
    transition: background 0.3s;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.carousel-button:hover {
    background: rgba(255, 255, 255, 0.5);
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    text-align: center;
    z-index: 3;
}

.text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.map-container {
    overflow: hidden;
    position: relative;
}

.map-container iframe {
    transition: all 0.3s ease;
}

.map-container:hover iframe {
    transform: scale(1.02);
}

/* Tambahkan smooth scroll */
html {
    scroll-behavior: smooth;
}

/* Offset untuk kompensasi fixed navbar */
#peta {
    scroll-margin-top: 70px; /* Sesuaikan dengan tinggi navbar Anda */
}

/* Hapus style .slide::after yang lama dan ganti dengan ini */
.carousel-container::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3); /* Overlay hitam transparan */
    z-index: 2; /* Pastikan overlay di atas gambar tapi di bawah teks */
}
</style>

<!-- JavaScript untuk slideshow -->
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
const slideContainer = document.querySelector('.slides');

function moveSlide(direction) {
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    updateSlidePosition();
}

function updateSlidePosition() {
    slideContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Tambahkan event listener untuk tombol keyboard (opsional)
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') moveSlide(-1);
    if (e.key === 'ArrowRight') moveSlide(1);
});
</script>
@endsection