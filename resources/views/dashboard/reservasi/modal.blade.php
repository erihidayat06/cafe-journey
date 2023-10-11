<!-- Modal -->
<div class="modal fade" id="deskripsiMakanan{{ $vip->id }}" tabindex="-1"
    aria-labelledby="deskripsiMakanan{{ $vip->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="deskripsiMakanan{{ $vip->id }}Label">
                    {{ $vip->nama_tempat }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-body-scondary">Harga </small>
                <p class="fs-5 text-color text-capitalize">{{ number_format("$vip->harga", 0, ',', '.') }}</p>
                <small class="text-body-scondary">Deskripsi </small>
                <div class="text-color mt-1 mb-3 text-capitalize">{!! $vip->deskripsi !!}</div>

                <small class="text-body-scondary">Kapasitas </small>
                <div class="text-color mt-1 mb-3 text-capitalize">{!! $vip->kapasitas !!}</div>

                <small class="text-body-scondary">Fasilitas </small>
                <div class="mt-2">
                    <?php $c = explode(',', $vip->fasilitas); ?>
                    @foreach ($c as $c)
                        <span class="fasilitas text-capitalize text-color">{{ $c }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
