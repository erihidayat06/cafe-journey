@extends('dashboard.booking.main')
@section('containerBooking')
    {{-- Data Booking --}}
    @foreach ($bookings as $booking)
        <div class="card m-2 p-3">
            <div class="row row-cols-2 row-cols-lg-5 g-3 g-lg-4">
                <div class="col">
                    <img src="{{ asset('storage/' . $booking->vip->gambar) }}" alt="..." width="120px" height="120px"
                        style="padding: 12px; object-fit: cover;">
                </div>
                <div class="col-lg-4 mb-2">
                    <h3 class="card-title p-0">{{ $booking->vip->nama_tempat }}</h3>
                    <span style="font-size: 12px" class="mb-1 p-0">Harga</span><br>
                    <?php $harga = $booking->vip->harga; ?>
                    <span class="card-text fs-5">Rp {{ number_format("$harga", 0, ',', '.') }}</span>

                    <p class="card-text text-decoration-underline"><a href="" data-bs-toggle="modal"
                            data-bs-target="#deskripsiMakanan{{ $booking->id }}"><small class="text-body-secondary">Detail
                                Pesanan</small></a></p>
                    @include('dashboard.booking.modal')
                </div>
                <div class="col">
                    <span style="font-size: 12px" class=" p-0">Nama Pemesan</span><br>
                    <span class="text-card fs-bold">{{ $booking->user->name }}</span><br>

                    <span style="font-size: 12px" class="mb-1 p-0">No Pesanan</span><br>
                    <span class="text-card fs-bold">{{ $booking->no_pesanan }}</span>
                </div>
                <div class="col mb-3">
                    <a href="/dashboard/vip/{{ $booking->vip->id }}/edit" data-bs-toggle="modal"
                        data-bs-target="#bukti{{ $booking->id }}" class="btn btn-sm btn-primary mt-3">Bukti
                        Bayar</a>

                    @if ($booking->opsi == 'tunggu')
                        <a style="padding: 4px 24px" class="btn btn-sm btn-danger mt-3" data-bs-toggle="modal"
                            data-bs-target="#status{{ $booking->id }}">Tunggu</a>
                    @elseif ($booking->opsi == 'sukses')
                        <a style="padding: 4px 24px" class="btn btn-sm btn-warning mt-3" data-bs-toggle="modal"
                            data-bs-target="#status{{ $booking->id }}">Sukses</a>
                    @elseif ($booking->opsi == 'selesai')
                        <a style="padding: 4px 24px" class="btn btn-sm btn-success mt-3" data-bs-toggle="modal"
                            data-bs-target="#status{{ $booking->id }}">Selesai</a>
                    @endif

                    @include('dashboard.booking.modalBukti')
                    @include('dashboard.booking.modalStatus')
                </div>

            </div>
        </div>
    @endforeach
@endsection
