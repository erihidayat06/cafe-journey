<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; //library pdf
use App\Models\Beli;
use App\Models\Booking;

class LaporanPDFController extends Controller
{
    public function pesananPDF(Beli $beli)
    {


        $pesanan = $beli->where('no_pesanan', $beli->no_pesanan)->latest()->get();

        $data = PDF::loadview('cetakPDF.cetakPesanan', [
            'pesanans' => $pesanan,
            'beli' => $beli
        ]);
        //mendownload laporan.pdf
        return $data->stream('Pesanan' . '-' . $beli->no_pesanan . '.pdf');
    }

    public function bookingPDF(Booking $booking)
    {

        $data = PDF::loadview('cetakPDF.cetakBooking', [
            'booking' => $booking
        ]);
        //mendownload laporan.pdf
        return $data->stream('Booking' . '-' . $booking->no_pesanan . '.pdf');
    }

    public function laporanBooking()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari', 'sampai']))->tanggal(request('filter'))->cari(request('cari'))->get();

        $data = PDF::loadview('cetakPDF.cetakDataBooking', [
            'bookings' => $booking
        ]);
        //mendownload laporan.pdf
        return $data->stream("booking" . '-' . request('status') . '-'  . date('d M Y') . '.pdf');
    }

    public function laporanBookingTunggu()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari', 'sampai']))->tanggal(request('filter'))->cari(request('cari'))->tunggu()->get();

        $data = PDF::loadview('cetakPDF.cetakDataBooking', [
            'bookings' => $booking
        ]);
        //mendownload laporan.pdf
        return $data->stream("booking" . '-' . request('status')  . '-' . date('d M Y') . '.pdf');
    }

    public function laporanBookingSukses()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari', 'sampai']))->tanggal(request('filter'))->cari(request('cari'))->sukses()->get();

        $data = PDF::loadview('cetakPDF.cetakDataBooking', [
            'bookings' => $booking
        ]);
        //mendownload laporan.pdf
        return $data->stream("booking" . '-' . request('status')  . '-' . date('d M Y') . '.pdf');
    }

    public function laporanBookingSelesai()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari', 'sampai']))->tanggal(request('filter'))->cari(request('cari'))->selesai()->get();

        $data = PDF::loadview('cetakPDF.cetakDataBooking', [
            'bookings' => $booking
        ]);
        //mendownload laporan.pdf
        return $data->stream("booking" . '-' . request('status')  . '-' . date('d M Y') . '.pdf');
    }
}
