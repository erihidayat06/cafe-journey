@extends('dashboard.layouts.main')

@section('container')
    <div class="card col-lg-8">
        <div class="card-body">
            <div class="card-title">
                Tambah Tempat Reservasi
            </div>
            <form action="/dashboard/vip" method="post" enctype="multipart/form-data">
                @csrf

                <label class="mt-3" for="nama_tempat">Nama Tempat</label>
                <input type="text" id="nama_tempat" name="nama_tempat"
                    class="form-control @error('nama_tempat') is-invalid @enderror">

                @error('nama_tempat')
                    <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label class="mt-3" for="harga">Harga</label>
                <input type="text" id="harga" name="harga"
                    class="form-control @error('harga') is-invalid @enderror">

                @error('harga')
                    <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                @enderror

                <!-- Quill Editor Default Input Deskripsi-->
                <div class="col-12">
                    <label class="mt-3" for="inputNanme4" class="form-label">Deskripsi</label>
                    <input id="deskripsi" class="@error('deskripsi') is-invalid @enderror" type="hidden"
                        value="{{ old('deskripsi') }}" name="deskripsi">

                    <trix-editor input="deskripsi"></trix-editor>
                    @error('deskripsi')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- End Quill Editor Default -->

                <label class="mt-3" for="kapasitas">Kapasitas</label>
                <input type="number" id="kapasitas" name="kapasitas" class="form-control">

                <label for="">Fasilitas</label><br>

                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                    <input type="checkbox" name="fasilitas[]" id="ac" value="ac" class="btn-check"
                        autocomplete="off">
                    <label for="ac" class="btn btn-outline-primary">AC</label>

                    <input type="checkbox" name="fasilitas[]" id="tv" value="tv" class="btn-check"
                        autocomplete="off">
                    <label for="tv" class="btn btn-outline-primary">TV</label>

                    <input type="checkbox" name="fasilitas[]" id="poyektor" class="btn-check" value="proyektor"
                        autocomplete="off">
                    <label for="poyektor" class="btn btn-outline-primary">Proyektor</label>

                    <input type="checkbox" name="fasilitas[]" id="papantulis" class="btn-check" value="papan tulis"
                        autocomplete="off">
                    <label for="papantulis" class="btn btn-outline-primary">papan tulis</label>

                    <input type="checkbox" name="fasilitas[]" id="meja" class="btn-check" value="meja"
                        autocomplete="off">
                    <label for="meja" class="btn btn-outline-primary">Meja</label>

                    <input type="checkbox" name="fasilitas[]" id="kursi" class="btn-check" value="kursi"
                        autocomplete="off">
                    <label for="kursi" class="btn btn-outline-primary">Kursi</label>
                </div>

                <div class="col-12">
                    <label for="gambar">Gambar</label><br>
                    <label for="gambar" style="width: 200px; height:200px; border:1px solid black; border-radius:10px">
                        <div style="margin:70px 0px " class="text-center" id="masukan-gambar">
                            <i class="bi bi-cloud-download"></i><br> Masukan foto
                        </div>
                        <img id="preview-makanan"
                            style="width:198.5px; height:198.5px;object-fit:cover; border-radius:10px; display:none"
                            src="" alt="">
                    </label>
                    <input type="file" class="form-control" hidden id="gambar" name="gambar"
                        onchange="previewGambar(this,'preview-makanan','masukan-gambar')">

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
