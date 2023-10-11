<!-- Modal -->
<div class="modal fade" id="deskripsiEvent{{ $event->id }}" tabindex="-1"
    aria-labelledby="deskripsiEvent{{ $event->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="deskripsiEvent{{ $event->id }}Label">{{ $event->nama_event }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Deskripsi : </h5>
                {!! $event->deskripsi !!}
            </div>
        </div>
    </div>
</div>
