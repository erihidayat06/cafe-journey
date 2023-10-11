<!-- Modal -->
<div class="modal fade" id="bukti{{ $booking->id }}" tabindex="-1" aria-labelledby="bukti{{ $booking->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="bukti{{ $booking->id }}Label">
                    {{ $booking->user->name }} | {{ $booking->no_pesanan }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                @if (isset($booking->bukti))
                    <h4>Bukti Pembayaran</h4>
                    <img style="border-radius: 10px" src="{{ asset('storage/' . $booking->bukti) }}" width="80%"
                        alt="">
                @else
                    <p>Pelanggan Belum Mengirim Bukti</p>
                @endif
            </div>
        </div>
    </div>
</div>
