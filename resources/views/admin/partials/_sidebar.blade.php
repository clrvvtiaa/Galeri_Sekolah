<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="/admin" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Fitur</span></li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.konten-beranda.index') }}" aria-expanded="false">
                                <i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Konten Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/petugas" aria-expanded="false">
                                <i data-feather="users" class="feather-icon"></i><span class="hide-menu">Manajemen Admin </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/categories" aria-expanded="false">
                                <i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Kategori Post </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/posts" aria-expanded="false">
                                <i data-feather="upload" class="feather-icon"></i><span class="hide-menu">Post</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/galleries" aria-expanded="false">
                                <i data-feather="image" class="feather-icon"></i><span class="hide-menu">Gallery</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('profiles.index') }}" aria-expanded="false">
                                <i data-feather="file" class="feather-icon"></i><span class="hide-menu">Manajemen Page</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/jurusan" aria-expanded="false">
                                <i data-feather="database" class="feather-icon"></i><span class="hide-menu">Jurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.sliders.index') }}" aria-expanded="false">
                                <i data-feather="film" class="feather-icon"></i><span class="hide-menu">Slider</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('map.index') }}" aria-expanded="false">
                                <i data-feather="map-pin" class="feather-icon"></i><span class="hide-menu">Maps</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>