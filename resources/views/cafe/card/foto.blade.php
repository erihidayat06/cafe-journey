<div class="container">
    <div class="card mt-2 p-2 rounded-sm border-0 shadow-sm">
        <div class="card-header">
            <h4 class="text-main ms-2">Gallery</h4>
        </div>
        <div class="card-body text-center d-flex flex-wrap justify-content-center">
            @foreach ($fotos as $foto)
                <div class="m-2" style="flex: 1; min-width: 200px; max-width: 100%;">
                    <a href="#" data-bs-target="#foto{{ $foto->id }}" data-bs-toggle="modal">
                        <img class="rounded-sm" style="object-fit: cover; width: 100%; height: 200px;"
                            src="{{ asset('storage/' . $foto->gambar) }}" alt="">
                        @include('cafe.modal.modalFoto')
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
