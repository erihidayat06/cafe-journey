@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
            <div class="mb-3 mt-3">
                <a href="/dashboard/minum/create" class="btn btn-main">Tambah Minuman</a>
            </div>
            @foreach ($minumans as $minuman)
                <div class="card m-2">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col">
                            <img src="{{ asset('storage/' . $minuman->gambar) }}" alt="..." width="120px" height="120px"
                                style="padding: 10px; object-fit: contain;">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <span class="card-title mb-1 p-0">{{ $minuman->nama_minuman }}</span>
                            <h4 class="card-text">Rp {{ number_format("$minuman->harga", 0, ',', '.') }}</h4>
                            <p class="card-text"><a href="" data-bs-toggle="modal"
                                    data-bs-target="#deskripsiMinuman{{ $minuman->id }}"><small
                                        class="text-body-secondary text-decoration-underline">Deskripsi</small></a></p>
                            @include('dashboard.menu.minuman.modal')
                        </div>
                        <div style="margin-right: 40px" class="col d-flex align-items-center p-3">
                            <a href="/dashboard/minum/{{ $minuman->id }}/edit" class="btn btn-success"><i
                                    class="bi bi-pencil-square"></i></a>

                            <form action="/dashboard/minum/{{ $minuman->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2"
                                    onclick="return confirm('Yakin Mau Hapus')"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (count($minumans) <= 0)
                <p class="text-center">Data Makanan Kosong</p>
            @endif
            <div class="row">
                {{ $minumans->links() }}
            </div>
        </div>
    </div>
@endsection
