@extends('layouts.main')

@section('container')
    @include('pesanan.navbar')
    <div class="mt-5">

        @if (count($cafes) >= 1)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Jika Masih Draf!</strong> Maka Pesananmu Masih di Menu Cafe
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($cafes as $cafe)
            @if (!isset($cafe->no_pesanan))
                <div class="card m-4">
                    <div class="card-body">
                        <div class="row row-cols-2">
                            <div class="col">
                                <small style="font-size: 11px">Nama Cafe</small><br>
                                <a class="text-main" href="/cafe/{{ $cafe->cafe->slug }}">{{ $cafe->cafe->nama_cafe }}</a>
                            </div>
                            <div class="col d-flex">
                                <div>
                                    <a href="" class=" btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#detail{{ $cafe->id }}">Detail</a>
                                </div>

                                @include('pesanan.modalDetail')
                                <form action="/beli/{{ $cafe->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ms-2"
                                        onclick="return confirm('Yakin Mau Hapus')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
