<div class="modal fade" id="foto{{ $foto->id }}" aria-hidden="true" aria-labelledby="foto{{ $foto->id }}Label"
    tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered p- rounded-sm">
        <div class="modal-content rounded-sm">
            {{-- <div class="modal-header py-3 pe-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body text-center">
                <img class="rounded-sm" style="object-fit: cover; width: 100%; height: 100%;"
                            src="{{ asset('storage/' . $foto->gambar) }}" alt="">
            </div>
        </div>
    </div>
</div>
