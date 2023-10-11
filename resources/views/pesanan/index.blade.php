@extends('layouts.main')

@section('container')
    @include('pesanan.navbar')
    <div class="mt-5 ">
        @if (count($cafes) >= 1)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Jika Sudah Memesan !</strong> Tunjukan Menu Yang Anda Pilih / Kode Qr Ke Kasir Cafe
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($cafes as $cafe)
            @if (isset($cafe->no_pesanan))
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row row-cols-2 row-cols-lg-4">
                            <div class="col">
                                <small style="font-size: 11px">Nama Cafe</small><br>
                                <a class="text-main" href="/cafe/{{ $cafe->cafe->slug }}">{{ $cafe->cafe->nama_cafe }}</a>
                            </div>
                            <div class="col">
                                <small style="font-size: 11px">No Pesanan</small><br>
                                {{ $cafe->no_pesanan }}
                            </div>
                            <div class="col">
                                <small style="font-size: 11px">tanggal</small><br>
                                {{ date('d M Y', strtotime($cafe->updated_at)) }} -
                                {{ date('d M Y', strtotime('+10 days', strtotime($cafe->updated_at))) }}
                            </div>

                            <div class="col mt-3">
                                <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailPesanan{{ $cafe->no_pesanan }}">Lihat Pesanan</a>
                                @include('pesanan.modalDetailPesan')
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
