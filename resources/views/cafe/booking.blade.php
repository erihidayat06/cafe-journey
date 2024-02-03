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
    <div class="container">
        <div class="row mt-2 text-center card rounded-sm p-3 shadow-sm border-0">
            <img src="https://img.freepik.com/free-vector/hungry-boy-concept-illustration_114360-16586.jpg?w=1080&t=st=1706934021~exp=1706934621~hmac=d3b2609adae350194b71a7f18884350a859d54167717a193f49a3bd62a39dca5" alt="" class="mx-auto img-empty-reservasi">
            <p class="text-main fw-bold pt-3">
                Saat ini tidak ada tempat yang dipesan
            </p>
        </div>
    </div>
    @endif
@endsection
