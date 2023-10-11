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
                        <label for="gambar-event"
                            style="width: 300px; height:120px; border:1px solid black;object-fit:cover; border-radius:10px">
                            @if (isset($event->gambar))
                                <img id="preview-event"
                                    style="width:298.5px; height:119.5px; position:absolute;  border-radius:10px;"
                                    src="{{ asset('storage/' . $event->gambar) }}" alt="">
                                <div class="text-minuman text-center fw-bold" id="masukan-gambar-event"><i
                                        class="bi bi-cloud-download"></i><br> Edit Foto</div>
                            @else
                                <div class="text-minuman text-center fw-bold" id="masukan-gambar-event"><i
                                        class="bi bi-cloud-download"></i><br> Edit Foto</div>
                                <img id=""
                                    style="width:298.5px; height:119.5px; object-fit:cover; border-radius:10px; display:none"
                                    src="" alt="">
                            @endif
                        </label>
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
