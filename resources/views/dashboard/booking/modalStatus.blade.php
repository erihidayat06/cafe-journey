<!-- Modal -->
<div class="modal fade" id="status{{ $booking->id }}" tabindex="-1" aria-labelledby="status{{ $booking->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="/dashboard/booking/{{ $booking->id }}" method="post">
                    @csrf
                    @method('put')
                    <h3>Status</h3>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input value="tunggu" @if ($booking->opsi == 'tunggu') checked @endif type="radio"
                            class="btn-check" name="opsi" id="opsi1{{ $booking->id }}" autocomplete="off">
                        <label class="btn btn-outline-danger" for="opsi1{{ $booking->id }}">Tunggu</label>

                        <input value="sukses" @if ($booking->opsi == 'sukses') checked @endif type="radio"
                            class="btn-check" name="opsi" id="opsi2{{ $booking->id }}" autocomplete="off">
                        <label class="btn btn-outline-warning" for="opsi2{{ $booking->id }}">Sukses</label>

                        <input value="selesai" @if ($booking->opsi == 'selesai') checked @endif type="radio"
                            class="btn-check" name="opsi" id="opsi3{{ $booking->id }}" autocomplete="off">
                        <label class="btn btn-outline-success" for="opsi3{{ $booking->id }}">Selesai</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan Status</button>
            </div>
        </div>
        </form>
    </div>
</div>
