@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Buat Daftar event</div>
                <form action="/dashboard/event/" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" value="{{ auth()->user()->cafe->id }}" name="cafe_id">
                    {{-- input nama event --}}
                    <label for="nama-event">Nama event</label>
                    <input type="text" class="form-control @error('nama_event') is-invalid @enderror" id="nama-event"
                        name="nama_event" value="{{ old('nama_event') }}">
                    @error('nama_event')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Quill Editor Default Input Deskripsi-->
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Deskripsi</label>
                        <input id="deskripsi" class="@error('deskripsi') is-invalid @enderror" type="hidden" value=""
                            name="deskripsi" value="{{ old('deskripsi') }}">

                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Quill Editor Default -->

                    <div class="col-12">
                        <label for="gambar-event">Gambar</label><br>
                        <label for="gambar-event"
                            style="width: 300px; height:120px; border:1px solid black; border-radius:10px">
                            <div style="margin:30px 0px " class="text-center" id="masukan-gambar-event"><i
                                    class="bi bi-cloud-download"></i><br> Masukan foto</div>
                            <img id="preview-event"
                                style="width:298.5px; height:119.5px;object-fit:contain; border-radius:10px; display:none"
                                src="" alt="">
                        </label>
                        <input type="file" class="form-control" hidden id="gambar-event" name="gambar"
                            onchange="previewGambar(this,'preview-event','masukan-gambar-event')">

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
