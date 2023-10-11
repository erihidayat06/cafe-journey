<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/cafe*') ? '' : 'collapsed' }}" href="/dashboard/cafe">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/foto*') ? '' : 'collapsed' }}" href="/dashboard/foto">
                <i class="bi bi-collection"></i>
                <span>Galeri Cafe</span>
            </a>
        </li><!-- End Foto Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/event*') ? '' : 'collapsed' }}" href="/dashboard/event">
                <i class="bi bi-calendar-event"></i>
                <span>Event Cafe</span>
            </a>
        </li><!-- End Event Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/minum') ? '' : (Request::is('dashboard/makanan') ? '' : 'collapsed') }}"
                data-bs-target="#typeProduk" data-bs-toggle="collapse" href="#">
                <i class="bi bi-list-ul "></i><span>Menu</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="typeProduk"
                class="nav-content collapse {{ Request::is('dashboard/minum') ? 'show' : (Request::is('dashboard/makanan') ? 'show' : '') }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/minum" class="{{ Request::is('dashboard/minum') ? 'active' : '' }}">
                        <i class="bi bi-circle "></i><span>Minuman</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/makanan" class="{{ Request::is('dashboard/makanan') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Makanan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/vip*') ? '' : (Request::is('dashboard/booking*') ? '' : 'collapsed') }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-folder"></i><span>Reservasi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav"
                class="nav-content collapse {{ Request::is('dashboard/vip*') ? 'show' : (Request::is('dashboard/booking*') ? 'show' : '') }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/vip" class="{{ Request::is('dashboard/vip*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Manajemen Tempat</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/booking/semua" class="{{ Request::is('dashboard/booking*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Bookingan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/beli') ? '' : 'collapsed' }}" href="/dashboard/beli">
                <i class="bi bi-currency-dollar"></i><span>Pesanan</span>
            </a>
        </li><!-- End Pesanan Nav -->



        <li class="nav-heading">Analis</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/analis') ? '' : 'collapsed' }}"
                href="/dashboard/analis?filter={{ date('Y-m') }}&waktu=Bulan Ini">
                <i class="bi bi-cart3"></i>
                <span>Analis</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
