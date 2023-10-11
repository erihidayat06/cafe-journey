<nav style="padding: 50px 0px" class="navbar navbar-expand-lg navbar-main-color">
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
        {{-- <button class="navbar-toggler btn mt-3 mb-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-grid"></i>
        </button> --}}
        <div>
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
    </div>
</nav>
