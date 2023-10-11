@extends('cafe.layouts.main')

@section('container')
    <div class="row row-cols-1 row-cols-md-6 g-4">

        <table>
            @foreach ($bookings as $booking)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $booking->gambar) }}" style="object-fit: cover" width="150px"
                            height="150px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">{{ $booking->nama_tempat }}</h6>
                            <p class="card-text fs-5">Rp {{ number_format("$booking->harga", 0, ',', '.') }}</p>
                            <span class="card-text"><a href="" class="text-main" data-bs-toggle="modal"
                                    data-bs-target="#deskripsiBooking{{ $booking->id }}"><small>Detail</small></a></span>
                            @include('cafe.modal.modalBooking')

                        </div>
                        @auth
                            <div class="card-footer">

                                <label for="makanan{{ $booking->id }}"><small class="btn btn-sm btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#formBooking{{ $booking->id }}">Booking</small></label>
                                @include('cafe.modal.modalFormBooking')
                                <input type="checkbox" id="makanan{{ $booking->id }}" hidden>
                            </div>
                        @else
                            <div class="card-footer text-center">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
                                    Beli
                                </button>
                            </div>
                            @include('login.modalLogin')
                        @endauth
                    </div>
                </div>
            @endforeach
        </table>
    </div>
    @if (count($bookings) <= 0)
        <div class="row mt-2 text-center">
            <p class="text-main">KOSONGGGG !!!!</p>
        </div>
    @endif
@endsection
