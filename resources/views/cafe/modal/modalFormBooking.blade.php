<!-- Modal -->
<div class="modal fade" id="formBooking{{ $booking->id }}" tabindex="-1"
    aria-labelledby="formBooking{{ $booking->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formBooking{{ $booking->id }}Label">{{ $booking->nama_tempat }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/booking" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="">Nama Tempat</label>
                        <input class="form-control" type="text" value="{{ $booking->nama_tempat }}" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Harga</label>
                        <input class="form-control" type="text" value="{{ $booking->harga }}" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_booking">Tanggal Booking</label>
                        <input name="tanggal_booking" id="tanggal_booking"
                            class="form-control @error('tanggal_booking') is-invalid @enderror" type="date">
                        @error('tanggal_booking')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jam_booking">Jam Booking</label>
                        <input name="jam_booking" id="jam_booking"
                            class="form-control @error('jam_booking') is-invalid @enderror" type="time">
                        @error('jam_booking')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        @auth
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        @endauth
                        <input type="hidden" name="vip_id" value="{{ $booking->id }}">
                        <input type="hidden" name="cafe_id" value="{{ $cafe->id }}">
                        <input type="hidden" name="pemilik" value="{{ $cafe->user->id }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Lanjut Booking</button>
            </div>
            </form>
        </div>
    </div>
</div>
