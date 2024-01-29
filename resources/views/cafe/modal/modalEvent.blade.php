<!-- Modal -->
<div class="modal fade" id="eventModal{{ $eventId }}" tabindex="-1" aria-labelledby="eventModal{{ $eventId }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="event{{ $event->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $event->gambar) }}" alt="..."
                    class="d-block w-100 object-fit-contain " width="100%" height="200px"><br>
                <span style="font-size: 12px">Nama Event</span><br>
                <span>{{ $event->nama_event }}</span><br>
                <span style="font-size: 12px">Deskripsi</span><br>
                <span>{!! $event->deskripsi !!}</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
