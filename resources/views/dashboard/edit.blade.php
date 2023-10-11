@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body mt-4">
                {{-- <h5 class="card-title">Vertical Form</h5> --}}
                <div class="mb-3">
                    <a href="/dashboard/cafe" class="btn btn-main"><i class="bi bi-arrow-left-short"></i> Back</a>
                </div>

                <div class="mb-3">
                    <!-- Vertical Form -->
                    <form class="row g-3" action="/dashboard/cafe/{{ $cafe->slug }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-12">

                            {{-- input banner --}}
                            <div class="container-image">
                                @if (isset($cafe->gambar_profil))
                                    <input type="hidden" value="{{ $cafe->gambar_profil }}" name="gambarLama">
                                @endif
                                <label for="banner" class="form-label input-img">
                                    @if (isset($cafe->gambar_profil))
                                        <img style=" cursor: pointer;" class="img-default-banner" id="preview"
                                            src="{{ asset('storage/' . $cafe->gambar_profil) }}" alt=""
                                            width="100%">
                                    @else
                                        <img style="display:none  cursor: pointer;" class="img-default-banner"
                                            id="preview" src="" alt="" width="100%">
                                    @endif
                                    <div class="text-banner" id="masukan-gambar"><i class="bi bi-cloud-download"></i><br>
                                        Masukan foto</div>
                                </label>
                            </div>
                            <input class="form-control " type="file" id="banner" name="gambar_profil" accept="image/*"
                                onchange="previewGambar(this,'preview','masukan-gambar')" hidden>
                        </div>
                        {{-- end input banner --}}

                        {{-- Input profil --}}
                        <div class="col-12 text-center">
                            <label style="top:90px" for="profil" class="form-label input-img-profil shadow">
                                <input type="hidden" value="{{ $cafe->gambar_logo }}" name="gambarLamaLogo">
                                <div class="text-banner" id="masukan-gambar-profil"><i class="bi bi-cloud-download"></i><br>
                                    Masukan foto</div>
                                @if (isset($cafe->gambar_logo))
                                    <img class="img-default-profil" src="{{ asset('storage/' . $cafe->gambar_logo) }}"
                                        id="preview-profil" alt="" width="100%">
                                @else
                                    <img style="display:none" class="img-default-profil" src="" id="preview-profil"
                                        alt="" width="100%">
                                @endif
                            </label>
                            <input class="form-control " type="file" name="gambar_logo" id="profil" accept="image/*"
                                onchange="previewGambar(this,'preview-profil','masukan-gambar-profil')" hidden>
                        </div>
                        {{-- end Input Profil --}}

                        <div class="col-12 mt-3">
                            <label for="nama_cafe" class="form-label">Nama Cafe</label>
                            <input type="text" class="form-control @error('nama_cafe') is-invalid @enderror"
                                id="nama_cafe" name="nama_cafe" value="{{ $cafe->nama_cafe }}">
                        </div>
                        <!-- Quill Editor Default -->
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Deskripsi</label>
                            <input id="deskripsi" type="hidden" value="{{ old('deskripsi', $cafe->deskripsi) }}"
                                name="deskripsi">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                        <!-- End Quill Editor Default -->

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="" class="form-control @error('alamat') is-invalid @enderror" cols="30"
                                rows="5" id="alamat" name="alamat">{{ $cafe->alamat }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="map" class="form-label">Map</label>
                            <textarea class="form-control @error('map') is-invalid @enderror" name="map" id="map" cols="20"
                                rows="5">{{ $cafe->map }}</textarea>
                            <!-- Button trigger modal -->
                            <a href="" data-bs-toggle="modal" data-bs-target="#mapModal">
                                <i class="bi bi-info-circle"></i> Cara Menambah Map
                            </a>
                            @include('dashboard.modalMap')
                        </div>

                        <div class="col-12">
                            <label for="Domisili" class="form-label">Domisili</label>
                            <select id="domisili"
                                class="form-control @error('domisili') is-invalid @enderror text-capitalize"
                                aria-label="Default select example" name="domisili">
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
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <select id="kecamatan"
                                class="form-control @error('kecamatan') is-invalid @enderror text-capitalize"
                                aria-label="Default select example" name="kecamatan">
                                @if ($cafe->kecamatan)
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
                            <label for="no_telepon" class="form-label">No Telepon</label>
                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                                id="no_telepon" value="{{ $cafe->no_telepon }}" name="no_telepon">
                        </div>

                        {{-- Input Pembayaran --}}
                        <p>Note : Bisa pilih <span class="text-danger">Dua / Salah Satu</span> Metode Pembayaran</p>
                        <div class="col-">
                            <label class="form-label" for="bank">Nama Bank</label>
                            <input type="text" value="{{ old('bank', $cafe) }}" class="form-control"
                                placeholder="Contoh : BRI" name="bank" id="bank">

                        </div>
                        <div class="col-">
                            <label class="form-label" for="no_rekening">No Rekening</label>
                            <input type="text" value="{{ old('no_rekening', $cafe) }}" name="no_rekening"
                                class="form-control" id="no_rekening">
                        </div>

                        <div class="col-">
                            <label class="form-label" for="wallet">E-Wallet</label>
                            <input type="text" value="{{ old('wallet', $cafe) }}" class="form-control"
                                placeholder="Contoh : Shopee Pay" name="wallet" id="wallet">
                        </div>
                        <div class="col-">
                            <label class="form-label" for="no_wallet">No E-Wallet</label>
                            <input type="text" value="{{ old('no_wallet', $cafe) }}" name="no_wallet"
                                class="form-control" id="no_wallet">
                        </div>
                        {{-- End Input Pembayaran --}}

                        <div class="col-12">
                            <label for="whatsapp" class="form-label">Whatsapp</label>
                            <input type="text" class="form-control  @error('whatsapp') is-invalid @enderror"
                                id="whatsapp" value="{{ $cafe->whatsapp }}" name="whatsapp">

                            <div class="col-12">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control @error('facebool') is-invalid @enderror"
                                    id="facebook" value="{{ $cafe->facebook }}" name="facebook">
                            </div>
                            <div class="col-12">
                                <label for="instagram" class="form-label">Insatagram</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                    id="instagram" value="{{ $cafe->instagram }}" name="instagram">
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-main">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        @endsection
