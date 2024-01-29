<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin') ? '' : 'collapsed' }}" href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/daftar-cafe*') ? '' : 'collapsed' }}"
                href="/admin/daftar-cafe/semua">
                <i class="bi bi-collection"></i>
                <span>Daftar Cafe</span>
            </a>
        </li><!-- End Foto Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/langganan*') ? '' : 'collapsed' }}" href="/admin/langganan">
                <i class="bi bi-calendar2-week"></i>
                <span>Langganan Cafe</span>
            </a>
        </li><!-- End Foto Nav -->

    </ul>

</aside><!-- End Sidebar-->
