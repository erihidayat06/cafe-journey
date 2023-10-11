{{-- Card Event --}}
<div id="carouselExampleInterval" class="carousel slide mb-4 shadow-sm" data-bs-ride="carousel">
    <div class="carousel-inner rounded-2">

        {{-- Slide Img Event --}}

        {{-- Active --}}
        @foreach ($events->take(1) as $event)
            <div style="background-color: #e6e6e6" class="carousel-item active " data-bs-interval="3000">
                <a href="" data-bs-toggle="modal" data-bs-target="#event{{ $event->id }}"><img
                        src="{{ asset('storage/' . $event->gambar) }}" class="d-block w-100 object-fit-contain "
                        alt="..." height="200px"></a>
            </div>
            @include('cafe.modal.modalEvent')
        @endforeach
        {{-- end Active --}}

        @foreach ($events->skip(1) as $event)
            <div style="background-color: #e6e6e6" class="carousel-item" data-bs-interval="3000">
                <a href="" data-bs-toggle="modal" data-bs-target="#event{{ $event->id }}"><img
                        src="{{ asset('storage/' . $event->gambar) }}" class="d-block w-100 object-fit-contain "
                        alt="..." height="200px"></a>
            </div>
            @include('cafe.modal.modalEvent')
        @endforeach
        {{-- End Slide Img Event --}}


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
