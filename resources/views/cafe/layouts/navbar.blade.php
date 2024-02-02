<nav class="navbar navbar-expand-lg py-3 shadow-sm fixed-top" style="background-color: #fff;">
    <div class="container">
        <a class="navbar-brand" href="/">Cafe Journey</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <button class="btn me-2" id="searchIcon">
                        <i class="bi bi-search"></i>
                    </button>
                    <form action="/" class="d-none" id="searchForm" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Nama Cafe [ENTER]"
                                aria-label="Cari Nama Cafe [ENTER]" name="cari" value="{{ request('cari') }}">
                        </div>
                    </form>
                </div>
                <a href="/booking" class="btn active-button position-relative ms-2">
                    <i class="bi bi-handbag-fill"></i> Pesanan
                    <span class="badge rounded-pill bg-light text-danger">
                        @if (count(auth()->user()->booking) !== null)
                            {{ count(auth()->user()->booking) }}
                        @endif
                    </span>
                </a>
                <li class="nav-item dropdown" style="list-style: none">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/avatars/5f/5fcc8703441cb378d610c5e8247cefdb2d52b46d_full.jpg"
                            alt="User Avatar" class="avatar rounded-circle ms-3" width="45" height="45">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end border-0 shadow mt-3">
                        <li class="text-center">
                            <h6 class="p-0">{{ auth()->user()->name }}</h6>
                            <span style="font-size: 14px; color:rgb(117, 117, 117)">User</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/profil">Profil</a></li>
                        <li class="d-flex justify-content-between align-items-start">
                            <a class="dropdown-item" href="/beli">Pesanan</a>
                        </li>
                        @can('admin')
                            <li><a class="dropdown-item" href="/dashboard/cafe/">Manajemen Cafe</a></li>
                        @endcan
                        @can('admin_web')
                            <li><a class="dropdown-item" href="/admin">Halaman Admin</a></li>
                        @endcan
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form id="logoutForm" action="/logout" method="POST">
                            @csrf
                            <li>
                                <button class="dropdown-item" type="button" onclick="confirmLogout()">Logout</button>
                            </li>
                        </form>
                    </ul>
                </li>
            @else
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contacts</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a id="button-register" href="/register" class="btn active-button">Sign Up</a>
                    {{-- <a id="button-login" href="/login" class="btn btn-light deactive-button">Login</a> --}}
                </div>
            @endauth
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchIcon = document.getElementById("searchIcon");
            const searchForm = document.getElementById("searchForm");

            searchIcon.addEventListener("click", function() {
                searchForm.classList.toggle("d-none");
                searchForm.classList.toggle("animate__animated");
                searchForm.classList.toggle("animate__slideInRight");

                // Durasi animasi
                searchForm.style.animationDuration = "1.2s";

                // Setelah klik tombol searchIcon, maka tombol searchIcon akan hilang 
                searchIcon.classList.toggle("d-none");
            });
        });

        // Alert Confirm Logout
        function confirmLogout() {
            if (window.confirm("Apakah Anda yakin ingin logout?")) {
                // Jika user mengonfirmasi, jalankan proses logout
                document.forms["logoutForm"].submit();
            } else {
                // Jika user membatalkan, tidak lakukan apa-apa
            }
        }
    </script>
</nav>

{{-- Card Description --}}

<section class="cafe-card-detail">
    <div class="card text-bg-dark container mt-5 rounded-sm shadow-sm">
        <img src="{{ asset('storage/' . $cafes->gambar_profil) }}" class="card-img rounded-sm img-cafe" alt="...">

        <div class="card-img-overlay bg-nav-cafe rounded-sm">
            <div class="row row-cols-1 row-cols-lg-2 ">
                <div class="col col-lg-2">
                    @if (isset($cafes->gambar_profil))
                        <img class="img-cafe-logo" src="{{ asset('storage/' . $cafes->gambar_logo) }}"
                            alt="">
                    @else
                        <img class="img-cafe-logo" src="/assets/img/default.png" alt="">
                    @endif
                </div>
                <div class="col">
                    <div class="text-cafe mt-4">
                        <h3 class="text-capitalize">{{ $cafes->nama_cafe }}</h3>
                        @if (count($semua) > 0)
                            @php
                                $rata_rata = $semua->sum('rating') / count($semua);
                                $jumlahRating = $semua->sum('rating');
                            @endphp
                        @endif
                        <a href="#rating" class="text-decoration-none text-white">
                            @if (isset($rata_rata))
                                <div style="color:#676767;"
                                    class="mt-2 mb-1 col d-flex justify-content-start align-items-center fw-normal">
                                    <div class="ratings mr-2 fs-6 d-flex text-white">
                                        <i
                                            class="{{ $rata_rata >= 1 ? 'text-warning bi bi-star-fill' : 'bi bi-star' }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 2 ? 'text-warning bi bi-star-fill' : ($rata_rata > 1 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 3 ? 'text-warning bi bi-star-fill' : ($rata_rata > 2 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 4 ? 'text-warning bi bi-star-fill' : ($rata_rata > 3 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 5 ? 'text-warning bi bi-star-fill' : ($rata_rata > 4 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }} "></i>
                                        <span class="fw-bold">&nbsp;{{ round($rata_rata, 1) }}</span>

                                        <span style="font-size: 12px; padding-bottom:1px"
                                            class="d-flex align-items-end">/5.0</span>
                                    </div>
                                </div>
                                <span style="font-size: 12px">{{ $jumlahRating }} dari ({{ count($semua) }}
                                    Ulasan)</span>
                            @else
                                <div style="color:#ffffff;"
                                    class="col mt-3 d-flex justify-content-start align-items-center fw-normal">
                                    <div class="ratings">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="fw-bold">&nbsp;0/5.0</span>
                                </div>
                                <span style="font-size: 12px; padding-bottom:1px" class="review-count mt-1">0 dari (0
                                    Ulasan)
                                </span>
                            @endif
                        </a>

                        <p class="text-capitalize" style="width: 70%">
                            {{ $cafes->alamat }}
                        </p>
                    </div>
                </div>

                <a href="#jadwal">
                    <div class="jadwal">
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        @include('cafe.layouts.jadwal')

                    </div>
                </a>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="container bg-light text-main rounded-pill shadow-sm py-2 mt-2">
            <div class="text-center" id="navbarNav">
                <ul class="nav ">
                    <li class="nav-item text-main">
                        <a style="color: #c1745f; {{ Request::is("cafe/$cafes->slug") ? 'border:2px solid #c1745f; border-radius: 30px; background-color: #c1745f; color:#fff' : '' }}"
                            class="nav-link" href="/cafe/{{ $cafes->slug }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #c1745f; {{ Request::is("cafe/ulasan/$cafes->slug") ? 'border:2px solid #c1745f; border-radius: 30px; background-color: #c1745f; color:#fff' : '' }}"
                            class="nav-link" href="/cafe/ulasan/{{ $cafes->slug }}">Ulasan</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #c1745f; {{ Request::is("cafe/menu/$cafes->slug") ? 'border:2px solid #c1745f; border-radius: 30px; background-color: #c1745f; color:#fff' : '' }}"
                            class="nav-link" href="/cafe/menu/{{ $cafes->slug }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #c1745f; {{ Request::is("cafe/booking/$cafes->slug") ? 'border:2px solid #c1745f; border-radius: 30px; background-color: #c1745f; color:#fff' : '' }}"
                            class="nav-link" href="/cafe/booking/{{ $cafes->slug }}">Reservasi</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #c1745f; {{ Request::is("cafe/jadwal/$cafes->slug") ? 'border:2px solid #c1745f; border-radius: 30px; background-color: #c1745f; color:#fff' : '' }}"
                            class="nav-link" href="/cafe/jadwal/{{ $cafes->slug }}">Jadwal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
