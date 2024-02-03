@extends('layouts.main')

@section('container')
    <div class="container">
        {{-- <link rel="stylesheet" href="/assets/css/style.css"> --}}
        <h3 class="mt-3">Kelola Tempat Terpesan</h3>
        <hr>
        @foreach ($bookings as $booking)
        <div class="card rounded-sm shadow-sm m-2 p-2">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 d-flex align-items-center">
                <div class="col">
                    <img class="rounded-sm" src="{{ asset('storage/' . $booking->vip->gambar) }}" alt="..." width="100%" height="100%" style="padding: 10px; object-fit: cover;">
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="cafe-desc">
                        <span class="card-title mb-1 p-0">
                            <a href="/cafe/{{ $booking->cafe->slug }}">{{ $booking->cafe->nama_cafe }}</a>
                        </span><br>
                        <small style="font-size: 10px;">Nama Tempat</small><br>
                        <span style="font-size: 14px;" class="card-title mb-1 p-0">
                            <a href="/cafe/{{ $booking->cafe->slug }}">{{ $booking->vip->nama_tempat }}</a>
                        </span>
                        <h4 class="card-text"></h4>
                        <p class="card-text text-decoration-underline">
                            <a href="" data-bs-toggle="modal" data-bs-target="#deskripsiBooking{{ $booking->id }}">
                                <small class="text-body-secondary">Detail</small>
                            </a>
                        </p>
                    </div>
                    @include('cafe.modal.modalBooking2')
                </div>
                
                <div class="col">
                    <small style="font-size: 10px">Status</small><br>
                    <span class="{{ $booking->opsi == 'tunggu' ? 'text-danger' : ($booking->opsi == 'sukses' ? 'text-warning' : 'text-success') }} fw-bold text-capitalize">
                        {{ $booking->opsi }}
                    </span>
                </div>
                <div class="col d-flex justify-content-start">
                    @if (!isset($booking->bukti))
                        <a class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#booking{{ $booking->id }}">Bayar</a>
                    @else
                        <a class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#booking{{ $booking->id }}">Pesanan</a>
                    @endif
                    @if ($booking->opsi == 'tunggu' && !isset($booking->bukti))
                        <form action="/booking/{{ $booking->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Yakin Gak Jadi Reservasi')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    @endif
                    @include('cafe.transaksi.modal')
                </div>
            </div>
        </div>
        
        @endforeach
        <div class="row mt-4">
            {{ $bookings->links() }}
        </div>
    </div>
@endsection
