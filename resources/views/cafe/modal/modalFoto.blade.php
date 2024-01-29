<div class="modal fade" id="foto{{ $foto->id }}" aria-hidden="true" aria-labelledby="foto{{ $foto->id }}Label"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered p-2">
        <div class="modal-content">
            <div class="modal-header p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img class="object-fit-contain rounded" class="mb-3 img-fluid"
                    src="{{ asset('storage/' . $foto->gambar) }}">
            </div>
        </div>
    </div>
</div>
