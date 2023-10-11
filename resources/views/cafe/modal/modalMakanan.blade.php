<!-- Modal -->
<div class="modal fade" id="deskripsiMakanan{{ $makanan->id }}" tabindex="-1"
    aria-labelledby="deskripsiMakanan{{ $makanan->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deskripsiMakanan{{ $makanan->id }}Label">{{ $makanan->nama_makanan }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-body-scondary">Nama Makanan </small>
                <p class="fs-5">{{ $makanan->nama_makanan }}</p>
                <small class="text-body-scondary">Harga </small>
                <p class="fs-5">{{ $makanan->harga }}</p>
                <small class="text-body-scondary">Deskripsi </small>
                {!! $makanan->deskripsi !!}
            </div>
        </div>
    </div>
</div>
