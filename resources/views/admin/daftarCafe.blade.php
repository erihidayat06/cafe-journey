@extends('admin.layouts.main')

@section('container')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">
                            Kelola Kafe
                        </h5>
                        <div class="table-responsive ">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                    <a class="nav-link text-color {{ Request::is('admin/daftar-cafe/semua') ? 'nav-border' : '' }} "
                                        aria-current="page" href="/admin/daftar-cafe/semua">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-color {{ Request::is('admin/daftar-cafe/tunggu') ? 'nav-border' : '' }}"
                                        href="/admin/daftar-cafe/tunggu">Tunggu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-color {{ Request::is('admin/daftar-cafe/konfir') ? 'nav-border' : '' }}"
                                        href="/admin/daftar-cafe/konfir">Terkonfirmasi</a>
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
                                        <th scope="col">Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($cafes as $cafe)
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
                                                <form action="/admin/daftar-cafe/{{ $cafe->id }}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <div class="btn-group btn-group-sm mb-2" role="group"
                                                        aria-label="Basic radio toggle button group">
                                                        <input type="radio" class="btn-check" name="konfirmasi"
                                                            id="btnradio1{{ $cafe->id }}" autocomplete="off"
                                                            {{ $cafe->konfirmasi === 'tunggu' ? 'checked' : '' }}
                                                            value="tunggu">
                                                        <label class="btn btn-outline-danger"
                                                            for="btnradio1{{ $cafe->id }}">Tunggu</label>

                                                        <input type="radio" class="btn-check" name="konfirmasi"
                                                            id="btnradio2{{ $cafe->id }}" autocomplete="off"
                                                            {{ $cafe->konfirmasi === 'konfirmasi' ? 'checked' : '' }}
                                                            value="konfirmasi">
                                                        <label class="btn btn-outline-success"
                                                            for="btnradio2{{ $cafe->id }}">Konfir</label>

                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary mb-2">Simpan</button>
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
