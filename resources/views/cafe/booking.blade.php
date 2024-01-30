@extends('cafe.layouts.main')

@section('container')
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <table>
            @foreach ($bookings as $booking)
                <div class="col">
                    <div class="card rounded-sm shadow-sm border-0 p-3 h-100">
                        <img src="{{ asset('storage/' . $booking->gambar) }}" style="object-fit: cover" width="150px"
                            height="150px" class="card-img-top rounded" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">{{ $booking->nama_tempat }}</h6>
                            <p class="card-text fs-5">Rp {{ number_format("$booking->harga", 0, ',', '.') }}</p>
                            <span class="card-text"><a href="" class="text-main text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#deskripsiBooking{{ $booking->id }}"><small>Lihat Detail</small></a></span>
                            @include('cafe.modal.modalBooking')

                        </div>
                        @auth
                            <div class="card-footer">

                                <label for="makanan{{ $booking->id }}"><small class="btn active-button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#formBooking{{ $booking->id }}">
                                        <i class="bi bi-building-add"></i>
                                        Booking
                                        </small>
                                </label>
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
