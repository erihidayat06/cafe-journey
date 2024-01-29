@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mt-3">
                    <a href="/dashboard/event" class="btn btn-main"><i class="bi bi-arrow-left-short"></i> Back</a>
                </div>

                <div class="card-title">Edit Daftar event</div>
                <form action="/dashboard/event/{{ $event->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- input nama event --}}
                    <label for="nama-event">Nama event</label>
                    <input type="text" class="form-control @error('nama_event') is-invalid @enderror" id="nama-event"
                        name="nama_event" value="{{ old('nama_event', $event) }}">
                    @error('nama_event')
                        <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Quill Editor Default Input Deskripsi-->
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Deskripsi</label>
                        <input id="deskripsi" class="@error('deskripsi') is-invalid @enderror" type="hidden"
                            value="{{ old('deskripsi', $event) }}" name="deskripsi">

                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                            <div style="font-size: 12px" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Quill Editor Default -->

                    <div class="col-12">
                        <label for="gambar-event">Gambar</label><br>
                        <label for="gambar-event" style="cursor: pointer; border:1px solid black; border-radius:10px">
                            @if (isset($event->gambar))
                                <div class="text-center text-minuman"
                                    style=" width: 200px; height: 200px; position:absolute" id="masukan-gambar-event">
                                    <i class="bi bi-cloud-download"></i><br>
                                    Ubah foto
                                </div>

                                <img id="preview-event"
                                    style="width:200px; height:200px; object-fit:contain; border-radius:10px;"
                                    src="{{ asset('storage/' . $event->gambar) }}" alt="">
                            @else
                                <div class="text-minuman text-center fw-bold" style="padding: 75px 60px"
                                    id="masukan-gambar-event"><i class="bi bi-cloud-download"></i><br> Ubah Foto</div>
                                <img id=""
                                    style="width:200px; height:200px; object-fit:cover; border-radius:10px; display:none"
                                    src="" alt="">
                            @endif
                        </label>
                        <div class="text-danger" style="font-size: 13px">Ukuran foto yang disarankan : 1080 X 1080 px *
                        </div>
                        <input type="hidden" value="{{ $event->gambar }}" name="gambar_lama">
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
