<div class="modal fade" id="foto{{ $foto->id }}" aria-hidden="true" aria-labelledby="foto{{ $foto->id }}Label"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-center p-1">
                <style>
                    .text-foto {
                        position: absolute;
                        padding: 187px 0;
                        border-radius: 10px;
                        width: 99%;
                        top: 48%;
                        left: 50%;
                        color: rgba(255, 255, 255, 0);
                        border: 1px solid rgba(0, 0, 0, 0);
                        transform: translate(-50%, -50%);
                        display: block;
                    }

                    .text-foto:hover {
                        background-color: #4b1f1fb5;
                        color: white;
                    }
                </style>

                <label for="gambar-foto{{ $foto->gambar }}" style="width: 100%; height:423px;  border-radius:10px">
                    @if (isset($foto->gambar))
                        <img id="preview-foto{{ $foto->gambar }}"
                            style="width:100%; height:420px;  border-radius:10px; object-fit:cover"
                            src="{{ asset('storage/' . $foto->gambar) }}" alt="">
                        <div class="text-foto text-center fw-bold" id="masukan-gambar-foto{{ $foto->gambar }}"><i
                                class="bi bi-cloud-download"></i><br> Edit Foto</div>
                    @else
                        <div class="text-foto text-center fw-bold" id="masukan-gambar-foto{{ $foto->gambar }}"><i
                                class="bi bi-cloud-download"></i><br> Edit Foto</div>
                        <img id=""
                            style="width:420px; height:420px; object-fit:cover; border-radius:10px; display:none"
                            src="" alt="">
                    @endif
                </label>

                <form action="/dashboard/foto/{{ $foto->id }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" value="{{ $foto->gambar }}" name="gambar_lama">
                    <input type="file" class="form-control" hidden id="gambar-foto{{ $foto->gambar }}" name="gambar"
                        onchange="previewGambar(this,'preview-foto{{ $foto->gambar }}','masukan-gambar-foto{{ $foto->gambar }}')">

                    <div style="margin-top: 20px" class="row row-cols-2">
                        <div class="col text-end">
                            <button type="submit" class="btn btn-sm btn-success">Edit</button>
                        </div>
                </form>
                <div class="col text-start">
                    <form action="/dashboard/foto/{{ $foto->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin Lu Mau Hapus Foto Ini')"
                            class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
