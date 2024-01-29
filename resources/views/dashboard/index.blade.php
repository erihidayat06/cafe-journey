@extends('dashboard.layouts.main')

@section('container')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Perhatian !</strong> Pastikan Data Cafe Telah di Isi Sebelum Menambahkan Data Produk
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body mt-4">
                {{-- <h5 class="card-title">Vertical Form</h5> --}}
                <div class="mb-3">
                    <a href="/dashboard/cafe/{{ $cafe->slug }}/edit" class="btn btn-main">Ubah Profil</a>
                </div>

                <div class="col-12">

                    {{-- input banner --}}
                    <div class="container-image">
                        <input type="hidden" value="{{ $cafe->gambar_profil }}" name="gambar-lama">
                        <label for="banner" class="form-label input-img">
                            @if (isset($cafe->gambar_profil))
                                <img class="img-default-banner" id="preview"
                                    src="{{ asset('storage/' . $cafe->gambar_profil) }}" alt="" width="100%">
                            @else
                                <img style="display:none" class="img-default-banner" id="preview" src=""
                                    alt="" width="100%">
                            @endif
                        </label>
                    </div>
                </div>
                {{-- end input banner --}}

                {{-- Input profil --}}
                <div class="col-12 text-center">
                    <label style="top: 90px" for="profil" class="form-label input-img-profil shadow">
                        @if (isset($cafe->gambar_logo))
                            <img class="img-default-profil" src="{{ asset('storage/' . $cafe->gambar_logo) }}"
                                id="preview-profil" alt="" width="100%">
                        @else
                            <img style="display:none" class="img-default-profil" src="" id="preview-profil"
                                alt="" width="100%">
                        @endif
                    </label>
                </div>
                {{-- end Input Profil --}}

                <div class="mt-3">
                    <!-- Button trigger modal jadwal -->
                    <button type="button" class="btn btn-main" data-bs-toggle="modal" data-bs-target="#jadwal">
                        Atur Jadwal
                    </button>

                    @include('dashboard.modal')
                </div>

                <div class="col-12 mt-4">
                    <label for="inputNanme4" class="form-label">Nama Cafe</label>
                    <input type="text" class="form-control" id="inputNanme4" name="nama_cafe"
                        value="{{ $cafe->nama_cafe }}" disabled>
                </div>
                <!-- Quill Editor Default -->
                <div class="col-12">
                    <label for="deskripsi" class="form-label">Deskripsi</label>

                    <span name="" class="form-control">{!! $cafe->deskripsi !!}</span>
                </div>
                <!-- End Quill Editor Default -->

                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="" class="form-control" cols="30" rows="5" id="alamat" name="alamat"
                        disabled>{{ $cafe->alamat }}</textarea>
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Map</label>
                    <input type="text" class="form-control" id="inputNanme4" value="{{ $cafe->map }}" name="map"
                        disabled>
                </div>

                <div class="col-12">
                    <label for="Domisili" class="form-label">Domisili</label>
                    <select id="domisili" class="form-control text-capitalize" aria-label="Default select example"
                        name="domisili" disabled>
                        @if ($cafe->domisili)
                            <option value="{{ $cafe->domisili }}">{{ $cafe->domisili }}</option>
                        @else
                            <option value="">--Pilih Kecamatan--</option>
                        @endif

                        @foreach ($domisili as $domisili)
                            @if ($domisili != $cafe->domisili)
                                <option value="{{ $domisili }}">{{ $domisili }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="col-12">
                    <label for="Domisili" class="form-label">Kecamatan</label>
                    <select id="domisili" class="form-control text-capitalize" aria-label="Default select example"
                        name="domisili" disabled>
                        @if ($cafe->domisili)
                            <option value="{{ $cafe->kecamatan }}">{{ $cafe->kecamatan }}</option>
                        @else
                            <option value="">--Pilih Kecamatan--</option>
                        @endif

                        @foreach ($kecamatan as $kecamatan)
                            @if ($kecamatan != $cafe->kecamatan)
                                <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="inputNanme4" value="{{ $cafe->no_telepon }}"
                        name="no_telepon" disabled>
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="inputNanme4" value="{{ $cafe->whatsapp }}"
                        name="whatsapp" disabled>
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="inputNanme4" value="{{ $cafe->facebook }}"
                        name="facebook" disabled>
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Insatagram</label>
                    <input type="text" class="form-control" id="inputNanme4" value="{{ $cafe->instagram }}"
                        name="instagram" disabled>
                </div>

            </div>

            <form action="/dashboard/cafe/{{ $cafe->slug }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger mt-2 ms-3 mb-3"
                    onclick="return confirm('Yakin Mau Hapus Cafe, Data Yang Ada Masukan Akan Terhapus Seluruhnya')">Hapus
                    Cafe</button>
            </form>
        </div>
    @endsection
