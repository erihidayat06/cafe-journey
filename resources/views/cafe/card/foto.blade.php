{{-- Card Foto --}}
<div class="card mt-2">
    <div class="card-body text-center ">
        <h4 class="text-main">Foto</h4>
        @foreach ($fotos as $foto)
            <a href="#" data-bs-target="#foto{{ $foto->id }}" data-bs-toggle="modal">
                <img style="object-fit: cover" class="mb-3 shadow-sm " src="{{ asset('storage/' . $foto->gambar) }}"
                    width="130px" height="130px" alt="">
                @include('cafe.modal.modalFoto')

            </a>
        @endforeach
    </div>
</div>
