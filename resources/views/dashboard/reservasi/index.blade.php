@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
            <div class="mb-3 mt-3">
                <a href="/dashboard/vip/create" class="btn btn-main">Tambah Tempat</a>
            </div>
            @foreach ($vips as $vip)
                <div class="card m-2">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col">
                            <img src="{{ asset('storage/' . $vip->gambar) }}" alt="..." width="120px" height="120px"
                                style="padding: 10px; object-fit: cover;">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <span class="card-title mb-1 p-0">{{ $vip->nama_tempat }}</span>
                            <h4 class="card-text">Rp {{ number_format("$vip->harga",0,",",".") }}</h4>
                            <p class="card-text text-decoration-underline"><a href="" data-bs-toggle="modal"
                                    data-bs-target="#deskripsiMakanan{{ $vip->id }}"><small
                                        class="text-body-secondary">Deskripsi</small></a></p>
                            @include('dashboard.reservasi.modal')
                        </div>
                        <div style="margin-right: 40px" class="col d-flex align-items-center p-3">
                            <a href="/dashboard/vip/{{ $vip->id }}/edit" class="btn btn-success"><i
                                    class="bi bi-pencil-square"></i></a>

                            <form action="/dashboard/makanan/{{ $vip->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2"
                                    onclick="return confirm('Yakin Mau Hapus')"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row mt-3">
                {{ $vips->links() }}
            </div>
        </div>
    </div>
@endsection
