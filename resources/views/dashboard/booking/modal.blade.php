<!-- Modal -->
<div class="modal fade" id="deskripsiMakanan{{ $booking->id }}" tabindex="-1"
    aria-labelledby="deskripsiMakanan{{ $booking->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="deskripsiMakanan{{ $booking->id }}Label">
                    {{ $booking->vip->nama_tempat }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <style>
                small {
                    font-size: 12px;
                }
            </style>
            <div class="modal-body">
                <div class="text-main mb-2">
                    <a target="_blank" href="/dashboard/booking/cetak-booking/{{ $booking->no_pesanan }}"
                        class="text-main"><i class="bi bi-printer"></i> Cetak</a>
                </div>
                <div class="row row-cols-lg-2 row-cols-2">
                    <div class="col">
                        <small class="text-body-scondary">Nama Pesanan </small>
                        <p class="fw-bold">{{ $booking->user->name }}</p>
                    </div>

                    <div class="col">
                        <small class="text-body-scondary">No Pesanan </small>
                        <p class="fw-bold">{{ $booking->no_pesanan }}</p>
                    </div>
                    <div class="col">
                        <small class="text-body-scondary">No Telepon </small>
                        <p class="fw-bold">{{ $booking->user->no_telepon }}</p>
                    </div>
                    <div class="col">
                        <small class="text-body-scondary">Tanggal Booking </small>
                        <p class="fw-bold">{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</p>
                    </div>
                    <div class="col">
                        <small class="text-body-scondary">Jam Booking</small>
                        <p class="fw-bold">{{ date('H:i', strtotime($booking->jam_booking)) }}</p>
                    </div>
                    <div class="col">
                        <small class="text-body-scondary">Tanggal Pesan </small>
                        <p class="fw-bold">{{ date('d M Y', strtotime($booking->created_at)) }}</p>
                    </div>
                    <div class="col">
                        <small class="text-body-scondary">Harga </small>
                        <?php $harga = $booking->vip->harga; ?>
                        <p class="fs-5 text-color text-capitalize">{{ number_format("$harga", 0, ',', '.') }}</p>
                    </div>
                </div>

                <small class="text-body-scondary">Deskripsi </small>
                <div class="text-color mt-1 mb-3 text-capitalize">{!! $booking->vip->deskripsi !!}</div>

                <small class="text-body-scondary">Fasilitas </small>
                <div class="mt-2">
                    <?php $c = explode(',', $booking->vip->fasilitas); ?>
                    @foreach ($c as $c)
                        <span class="fasilitas text-capitalize text-color">{{ $c }}</span>
                    @endforeach
                </div>
                <br>
                <small class="text-body-scondary">Kapasitas </small>
                <p class="fs-5">{{ $booking->vip->kapasitas }}</p>
            </div>
        </div>
    </div>
</div>
