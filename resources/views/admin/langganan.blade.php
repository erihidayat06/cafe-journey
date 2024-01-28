@extends('admin.layouts.main')

@section('container')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">Datatables</h5>


                        <div class="table-responsive ">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                    <a class="nav-link text-color {{ Request::is('admin/langganan') ? 'nav-border' : '' }} "
                                        aria-current="page" href="/admin/langganan">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-color {{ Request::is('admin/langganan/satu-minggu') ? 'nav-border' : '' }}"
                                        href="/admin/langganan/satu-minggu">Sisa Kurang Satu Minggu <span
                                            class="badge bg-danger rounded-pill">{{ count($sisa) }}</span></a>
                                </li>
                            </ul>

                            <hr>
                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama cafe</th>
                                        <th scope="col">Pemilik</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">No Atrian</th>
                                        <th scope="col">Waktu Sisa</th>
                                        <th scope="col">Tambah Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($cafes as $cafe)
                                        @php
                                            // Waktu target (contoh: 2024-01-28)
                                            $targetDate = new DateTime($cafe->langganan);

                                            // Waktu sekarang
                                            $now = new DateTime();

                                            // Hitung selisih waktu
                                            $interval = $now->diff($targetDate);

                                            // Dapatkan jumlah sisa hari
                                            $remainingDays = $interval->format('%r%a');
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $cafe->nama_cafe }}</td>
                                            <td>{{ $cafe->user->name }}</td>
                                            <td><a href="" data-bs-toggle="modal"
                                                    data-bs-target="#detail{{ $cafe->id }}">Detail</a>
                                                @include('admin.modalDetail')
                                            </td>
                                            <td>{{ $cafe->no_antrian }}</td>
                                            <td>
                                                @if ($now > $targetDate)
                                                    <span class="text-danger fw-bold">{{ $remainingDays }} Hari</span>
                                                @else
                                                    <span class="text-success fw-bold">{{ $remainingDays }} Hari</span>
                                                @endif


                                            </td>
                                            <td>
                                                <form action="/admin/langganan/{{ $cafe->id }}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <div class="d-flex justify-content-start">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="langganan">
                                                            <option value="+1 months">1 bulan</option>
                                                            <option value="+6 months">6 bulan</option>
                                                            <option value="+1 year">1 tahun</option>
                                                            <option value="+3 year">3 tahun</option>
                                                        </select>

                                                        <button type="submit" class="btn btn-sm btn-primary ms-2"
                                                            onclick="return confirm('Apakah Yakin Akan Menambah Waktu Cafe {{ $cafe->nama_cafe }}')">Simpan</button>
                                                    </div>
                                                </form>
                                            <td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
