<!-- Modal -->
<div class="modal fade" id="deskripsiMinuman{{ $minuman->id }}" tabindex="-1"
    aria-labelledby="deskripsiMinuman{{ $minuman->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deskripsiMinuman{{ $minuman->id }}Label">{{ $minuman->nama_minum }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-body-scondary">Nama Minuman </small>
                <p class="fs-5">{{ $minuman->nama_minuman }}</p>
                <small class="text-body-scondary">Harga </small>
                <p class="fs-5">{{ $minuman->harga }}</p>
                <small class="text-body-scondary">Deskripsi </small>
                {!! $minuman->deskripsi !!}
            </div>
        </div>
    </div>
</div>
