<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">

            <span class="d-none d-lg-block">Cafe Journey</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">

        @if (Request::is('dashboard/minum'))
            <form class="search-form d-flex align-items-center">
                <input type="text" name="cari" placeholder="Search" title="Enter search keyword"
                    value="{{ request('cari') }}">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        @elseif (Request::is('dashboard/makanan'))
            <form class="search-form d-flex align-items-center">
                <input type="text" name="cari" placeholder="Search" title="Enter search keyword"
                    value="{{ request('cari') }}">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        @elseif (Request::is('dashboard/vip'))
            <form class="search-form d-flex align-items-center">
                <input type="text" name="cari" placeholder="Search" title="Enter search keyword"
                    value="{{ request('cari') }}">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        @elseif (Request::is('dashboard/booking*'))
            <form class="search-form d-flex align-items-center">
                <input type="text" name="cari" placeholder="No Pesanan" title="Enter search keyword"
                    value="{{ request('cari') }}">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        @elseif (Request::is('dashboard/event'))
            <form class="search-form d-flex align-items-center">
                <input type="text" name="cari" placeholder="Search" title="Enter search keyword"
                    value="{{ request('cari') }}">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        @endif

    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>Admin</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/profil">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form action="/logout" method="POST">
                            @csrf
                    <li>
                        <button class="dropdown-item" type="submit">Logout</button>
                    </li>
                    </form>
            </li>

        </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
