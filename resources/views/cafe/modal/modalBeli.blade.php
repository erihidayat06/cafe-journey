<!-- Modal -->
<div class="modal fade" id="beli{{ $makanan->id }}" tabindex="-1" aria-labelledby="beli{{ $makanan->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="beli{{ $makanan->id }}Label">{{ $makanan->nama_makanan }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $makanan->gambar) }}" style="object-fit:contain" width="150px"
                    height="150px" class="card-img-top" alt="...">
                <span style="font-size: 12px">Nama Makanan</span>
                <h6 class="card-title p-0">{{ $makanan->nama_makanan }}</h6>
                <span style="font-size: 12px">Harga</span>
                <p class="card-text fs-5 p-0">Rp {{ number_format("$makanan->harga", 0, ',', '.') }}</p>
                <div class="b575-number-input number-input safari_only">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                    <input class="quantity" min="0" name="jumlah" value="1" type="number">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Beli</button>
            </div>
        </div>
    </div>
</div>
