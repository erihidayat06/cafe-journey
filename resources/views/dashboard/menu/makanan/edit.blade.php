@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mt-3">
                    <a href="/dashboard/makanan" class="btn btn-main"><i class="bi bi-arrow-left-short"></i> Back</a>
                </div>

                <div class="card-title">Edit Daftar Makanan</div>
                <form action="/dashboard/makanan/{{ $makanan->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- input nama makanan --}}
                    <label for="nama-makanan">Nama makanan</label>
                    <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror" id="nama-makanan"
                        name="nama_makanan" value="{{ old('nama_makanan', $makanan) }}">
                    @error('nama_makanan')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    {{-- input Harga --}}
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" value="{{ old('harga', $makanan) }}">

                    @error('harga')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Quill Editor Default Input Deskripsi-->
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Deskripsi</label>
                        <input id="deskripsi" class="@error('deskripsi') is-invalid @enderror" type="hidden"
                            value="{{ old('deskripsi', $makanan) }}" name="deskripsi">

                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Quill Editor Default -->

                    <div class="col-12">
                        <label for="gambar-makanan">Gambar</label><br>
                        <label for="gambar-makanan"
                            style="width: 200px; height:200px; border:1px solid black;object-fit:cover; border-radius:10px">
                            @if (isset($makanan->gambar))
                                <img id="preview-makanan"
                                    style="width:198.5px; height:198.5px; position:absolute;  border-radius:10px;"
                                    src="{{ asset('storage/' . $makanan->gambar) }}" alt="">
                                <div class="text-minuman text-center fw-bold" id="masukan-gambar-makanan"><i
                                        class="bi bi-cloud-download"></i><br> Edit Foto</div>
                            @else
                                <div class="text-minuman text-center fw-bold" id="masukan-gambar-makanan"><i
                                        class="bi bi-cloud-download"></i><br> Edit Foto</div>
                                <img id=""
                                    style="width:198.5px; height:198.5px; object-fit:contain; border-radius:10px; display:none"
                                    src="" alt="">
                            @endif
                        </label>
                        <input type="hidden" value="{{ $makanan->gambar }}" name="gambar_lama">
                        <input type="file" class="form-control" hidden id="gambar-makanan" name="gambar"
                            onchange="previewGambar(this,'preview-makanan','masukan-gambar-makanan')">

                    </div>

                    <div class="col-12 mt-3">
                        <div class="text-center">
                            <button type="submit" class="btn btn-main">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
