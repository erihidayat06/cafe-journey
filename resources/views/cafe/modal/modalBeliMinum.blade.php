<!-- Modal -->
@if (isset($minuman->id))
    <div class="modal fade" id="beliMinum{{ $minuman->id }}" tabindex="-1"
        aria-labelledby="beliMinum{{ $minuman->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="beliMinum{{ $minuman->id }}Label">{{ $minuman->nama_minuman }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/' . $minuman->gambar) }}" style="object-fit:contain" height="150px"
                        class="card-img-top" alt="...">
                    <span style="font-size: 12px" class="p-0">Nama Minuman</span>
                    <h6 class="card-title">{{ $minuman->nama_minuman }}</h6>
                    <span style="font-size: 12px" class="p-0">Harga</span>
                    <p class="card-text fs-5">Rp {{ number_format("$minuman->harga", 0, ',', '.') }}</p>
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
@endif
