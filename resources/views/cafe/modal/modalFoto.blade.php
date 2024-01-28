<div class="modal fade" id="foto{{ $foto->id }}" aria-hidden="true" aria-labelledby="foto{{ $foto->id }}Label"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img class="object-fit-contain rounded" class="mb-3" src="{{ asset('storage/' . $foto->gambar) }}"
                    width="100%" height="420px" alt="">
            </div>
        </div>
    </div>
</div>
