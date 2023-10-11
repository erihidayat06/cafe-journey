<!-- Modal -->
<div class="modal fade" id="booking{{ $booking->id }}" tabindex="-1" aria-labelledby="booking{{ $booking->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="booking{{ $booking->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <style>
                    tr,
                    td {
                        padding: 10px;
                    }
                </style>
                <div class="text-main mb-2">
                    <a target="_blank" href="/booking/cetak-booking/{{ $booking->no_pesanan }}" class="text-main"><i
                            class="bi bi-printer"></i> Cetak</a>
                </div>
                <table>
                    <tr>
                        <td>Nama Pemesan</td>
                        <td> : </td>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <td>No Pesanan</td>
                        <td> : </td>
                        <td>{{ $booking->no_pesanan }}</td>
                    </tr>
                    <tr>
                        <td>
                            <small style="font-size:12px">Pilih Pembayaran</small>
                        </td>
                    </tr>
                    <tr>
                        @if (isset($booking->cafe->no_rekening))
                            <td>{{ $booking->cafe->bank }}</td>
                            <td> : </td>
                            <td>{{ $booking->cafe->no_rekening }}</td>
                        @endif
                    </tr>
                    <tr>

                        @if (isset($booking->cafe->wallet))
                            <td>{{ $booking->cafe->wallet }}</td>
                            <td> : </td>
                            <td>{{ $booking->cafe->no_wallet }}</td>
                        @endif
                    </tr>

                </table>
                <small style="font-size:12px; margin-left:10px">Kirim Bukti :</small>
                <form action="/booking/{{ $booking->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-12 text-center">
                        <label for="bukti"
                            style="width: 71%; height:200px; border:1px solid black;object-fit:contain; border-radius:10px">
                            @if (isset($booking->bukti))
                                <div class="edit-bukti text-center fw-bold" id="masukan-bukti"><i
                                        class="bi bi-cloud-download"></i><br>
                                    Edit Bukti</div>
                                <img id="preview-bukti"
                                    style="width:100%; height:198.5px; object-fit:contain; border-radius:10px;"
                                    src="{{ asset('storage/' . $booking->bukti) }}" alt="">
                            @else
                                <div style="padding:70px" class="text-bukti text-center fw-bold" id="masukan-bukti"><i
                                        class="bi bi-cloud-download"></i><br>
                                    Kirim Bukti</div>
                                <img id="preview-bukti"
                                    style="width:100%; height:198.5px; object-fit:cover; border-radius:10px; display:none"
                                    src="" alt="">
                            @endif
                        </label>
                        <input type="hidden" value="{{ $booking->bukti }}" name="gambar_lama">
                        <input type="file" class="form-control" hidden id="bukti" name="bukti"
                            onchange="previewGambar(this,'preview-bukti','masukan-bukti')"><br>
                        <small>Atau</small>
                        <p>Hubungi
                            <span>
                                @if (isset($booking->bukti))
                                    <a href="https://api.whatsapp.com/send?phone=62{{ substr($booking->user->no_telepon, 1) }}&text=Status%20*Sudah%20Bayar!*%0ANama%20:%20{{ $booking->user->name }}%0ATanggal%20Booking%20:%20{{ date('d M Y', strtotime($booking->tanggal_booking)) }}%0AJam%20Booking%20:%20{{ date('H.i', strtotime($booking->jam_booking)) }}%0ANo%20Pesanan%20:%20*{{ $booking->no_pesanan }}*%0ATempat%20Booking%20:%20{{ $booking->vip->nama_tempat }}%0ATanggal Pesan : {{ date('d M Y', strtotime($booking->created_at)) }}"
                                        class="text-success"><i class="bi bi-whatsapp"></i>
                                        Cafe
                                    </a>
                                @else
                                    <a href="https://api.whatsapp.com/send?phone=62{{ substr($booking->user->no_telepon, 1) }}&text=Status%20*Belum%20Bayar!*%0ANama%20:%20{{ $booking->user->name }}%0ATanggal%20Booking%20:%20{{ date('d M Y', strtotime($booking->tanggal_booking)) }}%0AJam%20Booking%20:%20{{ date('H.i', strtotime($booking->jam_booking)) }}%0ANo%20Pesanan%20:%20*{{ $booking->no_pesanan }}*%0ATempat%20Booking%20:%20{{ $booking->vip->nama_tempat }}%0ATanggal Pesan : {{ date('d M Y', strtotime($booking->created_at)) }}"
                                        class="text-success"><i class="bi bi-whatsapp"></i>
                                        Cafe
                                    </a>
                                @endif
                            </span>
                        </p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim Bukti</button>
            </div>
        </div>
        </form>
    </div>
</div>
