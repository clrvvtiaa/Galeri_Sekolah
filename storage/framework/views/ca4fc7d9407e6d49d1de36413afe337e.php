<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <!-- Logo & Brand -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="<?php echo e(asset('assets/images/logo smk.png')); ?>" height="40" alt="Logo SMKN 4 Bogor">
            <span class="ms-2 fw-bold">SMK Negeri 4 Bogor</span>
        </a>

        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link <?php echo e(Request::is('profil') ? 'active' : ''); ?>" href="/profil">Profil</a>
                </li>
            </ul>
            <!-- Tombol Login -->
            <a 
                class="btn btn-primary text-white px-4 py-2 rounded shadow-sm" 
                href="<?php echo e(route('login')); ?>">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link.active {
        border-bottom: 3px solid #3498db; /* Menambahkan garis bawah pada item yang aktif */
        padding-bottom: 5px; /* Memberikan ruang di bawah teks */
    }
</style>
<?php /**PATH C:\ukk_sulistia\resources\views/navbar.blade.php ENDPATH**/ ?>