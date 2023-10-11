@extends('dashboard.layouts.main')

@section('container')
    {{-- Main Halaman Booking --}}
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    {{-- Filter --}}
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="/dashboard/booking/{{ $judul }}">All</a></li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/booking/{{ $judul }}?filter={{ date('Y-m-d') }}&waktu=Hari Ini">Hari</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/booking/{{ $judul }}?filter={{ date('Y-m') }}&waktu=Bulan Ini">Bulan
                                    Ini</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/booking/{{ $judul }}?filter={{ date('Y') }}&waktu=Tahun Ini">Tahun
                                    Ini</a>
                            </li>
                        </ul>
                    </div>
                    {{-- End Filter --}}



                    <div class="card-body">

                        {{-- Title --}}
                        <div class="card-title">
                            Data Pesanan {{ request('waktu') }}
                            @if (request('dari'))
                                : {{ date('d M Y', strtotime(request('dari'))) }} -
                                {{ date('d M Y', strtotime(request('sampai'))) }}
                            @endif
                        </div>

                        <h6 class="mt-3">Filter</h6>
                        <div class="input-group mb-3">

                            <form action="">
                                <div class="input-group input-group-sm">
                                    <input style="font-size: 11px" type="date" class="form-control" name="dari"
                                        value="{{ request('dari') }}" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">-</span>
                                    <input style="font-size: 11px" type="date" class="form-control" name="sampai"
                                        value="{{ request('sampai') }}" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <button type="submit" class="btn btn-sm btn-main btn-cari"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="text-main mb-2">

                            @if (request('dari'))
                                <a target="_blank"
                                    href="/dashboard/booking/laporan/{{ $judul }}?dari={{ request('dari') }}&sampai={{ request('sampai') }}&status={{ $judul }}"
                                    class="text-main"><i class="bi bi-printer"></i>
                                    Cetak</a>
                            @elseif (request('filter'))
                                <a target="_blank"
                                    href="/dashboard/booking/laporan/{{ $judul }}?filter={{ request('filter') }}&waktu={{ request('waktu') }}&status={{ $judul }}"
                                    class="text-main"><i class="bi bi-printer"></i>
                                    Cetak</a>
                            @else
                                <a target="_blank"
                                    href="/dashboard/booking/laporan/{{ $judul }}?status={{ $judul }}"
                                    class="text-main"><i class="bi bi-printer"></i>
                                    Cetak</a>
                            @endif
                        </div>
                        {{-- NavBar --}}
                        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="/dashboard/booking/semua"
                                    class="nav-link {{ Request::is('dashboard/booking/semua') ? 'active' : '' }}">Semua</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="/dashboard/booking/tunggu"
                                    class="nav-link {{ Request::is('dashboard/booking/tunggu') ? 'active' : '' }}">Tunggu</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="/dashboard/booking/sukses"
                                    class="nav-link {{ Request::is('dashboard/booking/sukses') ? 'active' : '' }}">Sukses</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="/dashboard/booking/selesai"
                                    class="nav-link {{ Request::is('dashboard/booking/selesai') ? 'active' : '' }}">Selesai</a>
                            </li>
                        </ul>
                        {{-- End Nav --}}

                        @yield('containerBooking')

                        @if (count($bookings) <= 0)
                            <p class="text-center">Data Booking Kosong</p>
                        @endif

                        <div class="row mt-3">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
