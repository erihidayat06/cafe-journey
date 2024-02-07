@extends('dashboard.layouts.main')

@section('container')
    <section class="section dashboard">
        <div class="row">

            <!-- Transaksi cafe -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    {{-- Filter --}}
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="/dashboard/beli">All</a></li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/beli?filter={{ date('Y-m-d') }}&waktu=Hari Ini">Hari</a></li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/beli?filter={{ date('Y-m') }}&waktu=Bulan Ini">Bulan Ini</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/beli?filter={{ date('Y') }}&waktu=Tahun Ini">Tahun Ini</a>
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
                        <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                        <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-3">


                            <div class="col-lg-4 mb-3">
                                <div id="reader"></div>
                            </div>

                            {{-- table qr --}}
                            @if (request('cari'))
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama pemesen</th>
                                                <th scope="col">No Pesanan</th>
                                                <th scope="col">Pesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cafes as $cafe)
                                                @if (isset($cafe->no_pesanan))
                                                    <tr>
                                                        <td>{{ $cafe->user->name }}</td>
                                                        <td> {{ $cafe->no_pesanan }}</td>
                                                        <td> <a href="" class="btn btn-sm btn-main"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#detailPesanan{{ $cafe->no_pesanan }}">Lihat</a>
                                                            @include('dashboard.beli.modalDetailPesan')</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>



                        {{-- Table all beli --}}
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama pemesen</th>
                                    <th scope="col">No Pesanan</th>
                                    <th scope="col">Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($beli as $cafe)
                                    @if (isset($cafe->no_pesanan))
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $cafe->user->name }}</td>
                                            <td> {{ $cafe->no_pesanan }}</td>
                                            <td> <a href="" class="btn btn-sm btn-main" data-bs-toggle="modal"
                                                    data-bs-target="#detailPesanan{{ $cafe->no_pesanan }}">Lihat</a>
                                                @include('dashboard.beli.modalDetailPesan')</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            $("#cari").val(decodedText)

            var redirectUrl = "http://127.0.0.1:8000/dashboard/beli?cari=" + decodedText;

            // Melakukan redirect ke URL yang ditentukan
            window.location.href = redirectUrl;

            scanSuccess = true;
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 150,
                    height: 150
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
