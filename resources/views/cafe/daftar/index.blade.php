@extends('login.layouts.main')
@section('container')
    <div class="row row-cols-1 row-cols-lg-12">
        <div class="col">
            <div class="card shadow-sm rounded-sm border-0 p-4">
                <div class="card-body">
                    <h3 class="py-2">
                        Register Your Cafe
                    </h3>
                    <form action="/daftar-cafe" method="post">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="nama_cafe">Nama Cafe</label>
                                    <input type="text" id="nama_cafe" value="{{ old('nama_cafe') }}" name="nama_cafe"
                                        class="form-control focus-ring focus-ring-warning @error('nama_cafe') is-invalid @enderror "
                                        autocomplete="off" autofocus>
                                    @error('nama_cafe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="text" id="no_telepon" name="no_telepon"
                                        class="form-control focus-ring focus-ring-warning @error('no_telepon') is-invalid @enderror"
                                        value="{{ old('no_telepon') }}" autocomplete="off">
                                    @error('no_telepon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat"
                                    class="form-control focus-ring focus-ring-warning @error('alamat') is-invalid @enderror" id=""
                                    cols="20" rows="5" value="{{ old('alamat') }}" autocomplete="off"></textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 mt-3">
                                <div class="form-group">
                                    <label for="domisili">Domisili</label>
                                    <select name="domisili" class="form-control @error('domisili') is-invalid @enderror" id="domisili"
                                        value="{{ old('domisili') }}">
                                        <option selected>--- Pilih Domisili ---</option>
                                        @foreach ($domisili as $domisili)
                                            <option value="{{ $domisili }}">{{ $domisili }}</option>
                                        @endforeach
                                    </select>
                                    @error('domisili')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror"
                                        id="kecamatan" value="{{ old('kecamatan') }}">
                                        <option selected>--- Pilih Kecamatan ---</option>
                                        @foreach ($kecamatan as $kecamatan)
                                            <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn active-button">
                                <i class="fas fa-paper-plane"></i>
                                Submit Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
