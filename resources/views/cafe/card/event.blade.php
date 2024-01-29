{{-- Title --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Event/Promo</h5>
</div>

<div id="carouselExampleInterval" class="carousel rounded-sm slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner rounded-2">

        @foreach ($events->chunk(4) as $key => $eventChunk)
            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}" data-bs-interval="3000">
                <div class="row">
                    @foreach ($eventChunk as $event)
                        <div class="col-md-3">
                            <div class="rounded-sm mb-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#eventModal{{ $event->id }}">
                                    <img src="{{ asset('storage/' . $event->gambar) }}"
                                        class="d-block rounded-sm w-100 object-fit-cover" alt="Event Image">
                                </a>
                            </div>
                        </div>
                        @include('cafe.modal.modalEvent', ['eventId' => $event->id])
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
