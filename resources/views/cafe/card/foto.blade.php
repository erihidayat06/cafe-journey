<div class="container">
    <div class="card mt-2 p-2 rounded-sm border-0 shadow-sm">
        <div class="card-header">
            <h4 class="text-main ms-2">Gallery</h4>
        </div>
        <div class="card-body text-center">
            @foreach ($fotos as $foto)
                <a href="#" data-bs-target="#foto{{ $foto->id }}" data-bs-toggle="modal">
                    <img style="object-fit: cover" class="mb-3 m-2 shadow-sm rounded-sm"
                        src="{{ asset('storage/' . $foto->gambar) }}" width="30%" height="200px" alt="">
                    @include('cafe.modal.modalFoto')
                </a>
            @endforeach
        </div>
    </div>
</div>
