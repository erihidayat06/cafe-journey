@extends('dashboard.layouts.main')

@section('container')
    <div class="card ">
        <div class="card-body">
            <div class="mb-3 mt-3">
                <a href="/dashboard/event/create" class="btn btn-main">Tambah event</a>
            </div>
            @foreach ($events as $event)
                <div class="card m-2">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col">
                            <a class="ms-3" href="#" data-bs-target="#foto{{ $event->id }}" data-bs-toggle="modal">
                                <img src="{{ asset('storage/' . $event->gambar) }}" alt="..." width="120px"
                                    height="50px" style="padding: 10px; object-fit: cover;">
                                @include('dashboard.event.modalFoto')

                            </a>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <span class="card-title mb-1 p-0">{{ $event->nama_event }}</span>
                            <p class="card-text text-decoration-underline"><a href="" data-bs-toggle="modal"
                                    data-bs-target="#deskripsiEvent{{ $event->id }}"><small
                                        class="text-body-secondary">Deskripsi</small></a></p>
                            @include('dashboard.event.modal')
                        </div>
                        <div style="margin-right: 40px" class="col d-flex align-items-center p-3">
                            <a href="/dashboard/event/{{ $event->id }}/edit" class="btn btn-success"><i
                                    class="bi bi-pencil-square"></i></a>

                            <form action="/dashboard/event/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2"
                                    onclick="return confirm('Yakin Mau Hapus')"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (count($events) <= 0)
                <p class="text-center">Data event Kosong</p>
            @endif

            {{-- <div class="row mt-3">
                {{ $events->links() }}
            </div> --}}
        </div>

    </div>
@endsection
