<!-- Modal -->
<div class="modal fade" id="deskripsiBooking{{ $booking->id }}" tabindex="-1"
    aria-labelledby="deskripsiBooking{{ $booking->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deskripsiBooking{{ $booking->id }}Label">{{ $booking->nama_tempat }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <small class="text-body-scondary">Harga </small>
                <p class="fs-5">Rp {{ number_format("$booking->harga", 0, ',', '.') }}</p>
                <small class="text-body-scondary">Deskripsi </small>
                {!! $booking->deskripsi !!}
                <br>
                <small class="text-body-scondary">Fasilitas </small>
                <p style="margin-top: 10px">
                    @foreach (explode(',', $booking->fasilitas) as $fasilitas)
                        <span class="fasilitas text-capitalize text-color">{{ $fasilitas }}</span>
                    @endforeach
                </p>
                <small class="text-body-scondary">Kapasitas </small>
                <p class="fs-5">{{ $booking->kapasitas }}</p>
            </div>
        </div>
    </div>
</div>
