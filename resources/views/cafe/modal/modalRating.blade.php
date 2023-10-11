<!-- Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ratingModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                @if ($ulasan !== 'p')
                    <h5>Beri Rating Dan Ulasan Untuk Cafe <span class="text-danger">{{ $cafes->nama_cafe }}</span>
                    </h5>

                    <p> Rating </p>
                    <div class="rating">
                        <div class="rate fs-2">
                            <span>
                                <?= $ulasan->rating >= 1 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                            <span>
                                <?= $ulasan->rating >= 2 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                            <span>
                                <?= $ulasan->rating >= 3 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                            <span>
                                <?= $ulasan->rating >= 4 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                            <span>
                                <?= $ulasan->rating == 5 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>

                        </div>
                    </div>

                    <div class="ulasan">
                        <p>Ulasan</p>
                        <textarea class="form-control" name="ulasan" id="ulasan" cols="30" rows="5" disabled>{{ $ulasan->ulasan }}</textarea>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="cafe_id" value="{{ $cafes->id }}">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        @else
            <form action="/rating" method="post">
                @csrf
                <h5>Beri Rating Dan Ulasan Untuk Cafe <span class="text-danger">{{ $cafes->nama_cafe }}</span>
                </h5>

                <p> Rating </p>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>

                <div class="ulasan">
                    <p>Ulasan</p>
                    <textarea class="form-control" name="ulasan" id="ulasan" cols="30" rows="5"></textarea>
                </div>

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="cafe_id" value="{{ $cafes->id }}">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        @endif

        </form>
    </div>
</div>
</div>
