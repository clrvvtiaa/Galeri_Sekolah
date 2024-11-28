<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <title>@yield('title') - SMKN 4 Bogor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS dan dependensi Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</head>
<body class="d-flex flex-column min-vh-100">
    @include('navbar')
    
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light mt-auto py-3">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-6">
                <h5 class="fw-bold mb-3 text-secondary border-bottom pb-2">SMK Negeri 4 Bogor</h5>
                <div class="contact-info">
                    <div class="d-flex align-items-start mb-2 hover-effect">
                        <i class="fas fa-map-marker-alt text-secondary mt-1 me-2"></i>
                        <p class="mb-0 text-muted small">Jl. Raya Tajur, Kp. Buntar RT.02/RW.07, Muarasari, Kec. Bogor Sel., Kota Bogor</p>
                    </div>
                    <div class="d-flex align-items-center mb-2 hover-effect">
                        <i class="fas fa-phone text-secondary me-2"></i>
                        <p class="mb-0 text-muted small">(0251) 8242411</p>
                    </div>
                    <div class="d-flex align-items-center hover-effect">
                        <i class="fas fa-envelope text-secondary me-2"></i>
                        <p class="mb-0 text-muted small">info@smkn4bogor.sch.id</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-md-end">
                <div class="social-links d-flex gap-2">
                    <a href="https://web.facebook.com/profile.php?id=100054636630766" 
                       class="social-btn" 
                       target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/smkn4kotabogor/" 
                       class="social-btn" 
                       target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UC4M-6Oc1ZvECz00MlMa4v_A/videos" 
                       class="social-btn" 
                       target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="mailto:smkn4@smkn4bogor.sch.id" 
                       class="social-btn">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send/?phone=6282260168886" 
                       class="social-btn" 
                       target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-top mt-3 pt-2">
            <p class="text-center text-muted mb-0">
                <small>&copy; {{ date('Y') }} SMK Negeri 4 Bogor_Sulistia Maharani Syafitri. All rights reserved.</small>
            </p>
        </div>
    </div>
</footer>

<style>
    .hover-effect {
        transition: all 0.3s ease;
    }
    .hover-effect:hover {
        transform: translateX(5px);
    }
    .social-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        color:linear-gradient(45deg, #ff9a9e, #a18cd1) ;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid linear-gradient(45deg, #ff9a9e, #a18cd1) ;
    }
    .social-btn:hover {
        background: linear-gradient(45deg, #ff9a9e, #a18cd1); ;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>
