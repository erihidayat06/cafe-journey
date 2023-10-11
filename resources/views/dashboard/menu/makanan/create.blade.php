@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Buat Daftar makanan</div>
                <form action="/dashboard/makanan/" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" value="{{ $cafe->id }}" name="cafe_id">
                    {{-- input nama makanan --}}
                    <label for="nama-makanan">Nama makanan</label>
                    <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror" id="nama-makanan"
                        name="nama_makanan">
                    @error('nama_makanan')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    {{-- input Harga --}}
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga">

                    @error('harga')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Quill Editor Default Input Deskripsi-->
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Deskripsi</label>
                        <input id="deskripsi" class="@error('deskripsi') is-invalid @enderror" type="hidden" value=""
                            name="deskripsi">

                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Quill Editor Default -->

                    <div class="col-12">
                        <label for="gambar-makanan">Gambar</label><br>
                        <label for="gambar-makanan"
                            style="width: 200px; height:200px; border:1px solid black; border-radius:10px">
                            <div style="margin:70px 0px " class="text-center" id="masukan-gambar-makanan"><i
                                    class="bi bi-cloud-download"></i><br> Masukan foto</div>
                            <img id="preview-makanan"
                                style="width:198.5px; height:198.5px;object-fit:contain; border-radius:10px; display:none"
                                src="" alt="">
                        </label>
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
