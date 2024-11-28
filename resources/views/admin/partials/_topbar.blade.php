<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html" class="gallery-link d-flex align-items-center">
                        <img src="/assets/images/logo smk.png" alt="Logo SMKN 4 Bogor" class="logo">
                            Web Galeri
                        </a>

<style>
    .gallery-link {
        display: flex;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }

    .gallery-link .logo {
        width: 60px; /* Ukuran logo yang lebih kecil */
        height: auto;
        margin-right: 10px; /* Memberikan jarak antara logo dan teks */
    }

    .gallery-link:hover {
        color: #0056b3; /* Warna teks berubah saat hover */
    }
</style>


                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end ms-auto">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                
                            <div class="dropdown-divider"></div>
<a class="dropdown-item" href="/logout" style="background-color: #f8f9fa; color: #333; padding: 10px 20px; border-radius: 5px;" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.color='#333';">
    <i data-feather="power" class="svg-icon me-2 ms-1"></i>
    Logout
</a>

                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>