@extends('dashboard.layouts.main')

@section('container')
    <div class="card mt-2">
        <div class="card-body">

            @if (count($fotos) !== 10)
                <a class="btn btn-sm btn-main mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Foto</a>
                @include('dashboard.foto.modal.modalCreate')
            @else
                <button class="btn btn-sm btn-main mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    disabled>Tambahkan
                    Foto</button>
            @endif
            <h4 class="card-title">Foto</h4>
            @foreach ($fotos as $foto)
                <a data-bs-target="#foto{{ $foto->id }}" data-bs-toggle="modal"><img style="object-fit: cover"
                        class="mb-3 ms-3 shadow-sm" src="{{ asset('storage/' . $foto->gambar) }}" width="130px"
                        height="130px" alt=""></a>
                @include('dashboard.foto.modal.modalFoto')
            @endforeach
        </div>
    </div>
@endsection
