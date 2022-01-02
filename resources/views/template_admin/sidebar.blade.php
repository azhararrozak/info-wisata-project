<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLay1" aria-expanded="false" aria-controls="collapseLay1">
                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                Postingan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLay1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('post.index') }}">List Post</a>
                                    <a class="nav-link" href="{{ route('post.create') }}">Tambah Post</a>
                                    <a class="nav-link" href="{{ route('post.tampilkan_post_terhapus') }}">Postingan di Hapus</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLay2" aria-expanded="false" aria-controls="collapseLay2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kategori
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLay2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('category.index') }}">List Kategori</a>
                                    <a class="nav-link" href="{{ route('category.create') }}">Tambah Kategori</a>
                                </nav>
                            </div>
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLay3" aria-expanded="false" aria-controls="collapseLay3">
                                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                                Tags
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLay3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('tag.index') }}">List Tags</a>
                                    <a class="nav-link" href="{{ route('tag.create') }}">Tambah Tags</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Pengguna
                            </a>
                        </div>
                    </div>
                </nav>
            </div>