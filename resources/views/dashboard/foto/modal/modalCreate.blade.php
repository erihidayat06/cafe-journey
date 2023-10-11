<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="/dashboard/foto" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="gambar"
                        style="width: 200px; height:200px; border:1px solid black; border-radius:10px">
                        <div style="margin:70px 0px " class="text-center" id="masukan-gambar"><i
                                class="bi bi-cloud-download"></i><br> Masukan foto</div>
                        <img id="preview"
                            style="width:198.5px; height:198.5px;object-fit:cover; border-radius:10px; display:none"
                            src="" alt="">
                    </label>
                    <input type="file" class="form-control" hidden id="gambar" name="gambar"
                        onchange="previewGambar(this,'preview','masukan-gambar')">

                    <input type="hidden" name="cafe_id" value="{{ auth()->user()->cafe->id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-main">Tambah Foto</button>
            </div>
            </form>
        </div>
    </div>
</div>
