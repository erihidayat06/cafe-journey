<nav class="navbar navbar-expand-lg py-3 shadow-sm" style="background-color: #fff;">
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
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
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
            <a style="width: 120px" href="/booking" class="btn rounded-75 btn-primary position-relative ms-2">
                <i class="bi bi-handbag-fill"></i> Pesanan
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                    @if (count(auth()->user()->booking) !== null)
                        {{ count(auth()->user()->booking) }}
                    @endif
                </span>
            </a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/avatars/5f/5fcc8703441cb378d610c5e8247cefdb2d52b46d_full.jpg" alt="User Avatar"
                        class="avatar rounded-circle ms-3" width="40" height="40">
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
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bantuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a style="padding: 5px 10px" href="/register" class="btn rounded btn-primary ">Daftar</a>
                <a style="padding: 4px 11px" href="/login"
                    class="btn btn-light rounded">Masuk</a>
            </div>
            @endauth
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const searchIcon = document.getElementById("searchIcon");
        const searchForm = document.getElementById("searchForm");

            searchIcon.addEventListener("click", function () {
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

{{-- <nav style="padding: 50px 0px" class="navbar navbar-expand-lg navbar-main-color">
    <div class="container-fluid">
        <a class="navbar-brand text-light d-flex align-items-end mt-2" href="/">
            <img src="assets/img/logo1.png" width="17px" alt="">
            <span class="ms-3"> Cafe Journey</span>
        </a>
        <div class="col-lg-8 mt-3 ">
            <form action="/" class="d-flex" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama Cafe/Daerah Cafe"
                        aria-label="Cari Nama Cafe/Daerah Cafe" aria-describedby="basic-addon2" name="cari"
                        value="{{ request('cari') }}">
                    <button type="submit" class="btn btn-primary btn-cari" id="basic-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <ul class="navbar-nav me-auto mt-3">
            @auth
                <div class="row row-cols-lg-2">
                    <div class="col">
                        <a style="width: 120px" href="/booking" class="btn btn-primary position-relative ms-2"><i
                                class="bi bi-building-check"></i>
                            Booking <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                @if (count(auth()->user()->booking) !== null)
                                    {{ count(auth()->user()->booking) }}
                                @endif
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ substr(auth()->user()->name, 0, 9) }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
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
                                <form action="/logout" method="POST">
                                    @csrf
                                    <li><button class="dropdown-item" type="submit">Logout</button></li>
                                </form>
                            </ul>
                        </li>
                    </div>
                </div>
            </ul>
        @else
            <li class="nav-item dropdown">
                <a style="padding: 5px 10px" href="/register" class="btn btn-sm btn-primary ">Daftar</a>
                <a style="padding: 4px 11px" href="/login"
                    class="btn btn-sm btn-light border border-3 border-white text-main">Masuk</a>
            </li>
        @endauth
        </ul>
    </div>
</nav> --}}
