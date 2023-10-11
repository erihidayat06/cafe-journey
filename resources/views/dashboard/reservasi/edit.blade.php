@extends('dashboard.layouts.main')

@section('container')
    <div class="card col-lg-8">
        <div class="card-body">
            <div class="mt-3">
                <a href="/dashboard/vip" class="btn btn-main"><i class="bi bi-arrow-left-short"></i> Back</a>
            </div>
            <div class="card-title">
                Edit Tempat Reservasi
            </div>
            <form action="/dashboard/vip/{{ $vip->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="nama_tempat">Nama Tempat</label>
                <input type="text" id="nama_tempat" name="nama_tempat"
                    class="form-control @error('nama_tempat') is-invalid @enderror" value="{{ old('nama_tempat', $vip) }}">
                @error('nama_tempat')
                    <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label class="mt-3" for="harga">Harga</label>
                <input type="text" id="harga" name="harga"
                    class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $vip) }}">

                @error('harga')
                    <div style="font-size: 12px" class="invalid-feedback">{{ $message }}
                    </div>
                @enderror

                <!-- Quill Editor Default Input Deskripsi-->
                <div class="col-12">
                    <label class="mt-3" for="inputNanme4" class="form-label">Deskripsi</label>
                    <input id="deskripsi" class="@error('deskripsi') is-invalid @enderror" type="hidden"
                        value="{{ old('deskripsi', $vip) }}" name="deskripsi">

                    <trix-editor input="deskripsi"></trix-editor>
                    @error('deskripsi')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- End Quill Editor Default -->

                <label class="mt-3" for="kapasitas">Kapasitas</label>
                <input type="number" id="kapasitas" name="kapasitas" class="form-control"
                    value="{{ old('kapasitas', $vip) }}">

                <label for="">Fasilitas</label><br>

                {{-- Checkbox Fasilitas --}}
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($b as $b)
                        <input checked='on' type="checkbox" name="fasilitas[]" id="{{ $b }}"
                            value="{{ $b }}" class="btn-check" autocomplete="off">
                        <label for="{{ $b }}" class="btn btn-outline-primary">{{ $b }}</label>
                    @endforeach
                    @foreach ($c as $c)
                        <input type="checkbox" name="fasilitas[]" id="{{ $c }}" class="btn-check"
                            value="{{ $c }}" autocomplete="off">
                        <label for="{{ $c }}" class="btn btn-outline-primary">{{ $c }}</label>
                    @endforeach
                </div>
                {{-- End  Checkbox Fasilitas --}}

                <div class="col-12">
                    <label for="gambar">Gambar</label><br>
                    <label for="gambar"
                        style="width: 200px; height:200px; border:1px solid black;object-fit:cover; border-radius:10px">
                        @if (isset($vip->gambar))
                            <img id="preview"
                                style="width:198.5px; height:198.5px; position:absolute;  border-radius:10px;"
                                src="{{ asset('storage/' . $vip->gambar) }}" alt="">
                            <div class="text-minuman text-center fw-bold" id="masukan-gambar"><i
                                    class="bi bi-cloud-download"></i><br> Edit Foto</div>
                        @else
                            <div class="text text-center fw-bold" id="masukan-gambar"><i
                                    class="bi bi-cloud-download"></i><br> Edit Foto</div>
                            <img id=""
                                style="width:198.5px; height:198.5px; object-fit:cover; border-radius:10px; display:none"
                                src="" alt="">
                        @endif
                    </label>
                    <input type="hidden" value="{{ $vip->gambar }}" name="gambar_lama">
                    <input type="file" class="form-control" hidden id="gambar" name="gambar"
                        onchange="previewGambar(this,'preview','masukan-gambar')">

                </div>
                <input type="hidden" value="{{ auth()->user()->cafe->id }}" name="cafe_id">

                <div class="mt-3 mb-4 text-center">
                    <button type="submit" class="btn btn-main">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </form>
        </div>
    </div>
@endsection
