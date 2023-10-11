<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardBookingController extends Controller
{
    public function index()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->cari(request('cari'))->paginate(10);

        $judul = 'semua';
        return view('dashboard.booking.booking', [
            'bookings' => $booking,
            'judul' => $judul
        ]);
    }

    public function tunggu()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->cari(request('cari'))->tunggu()->paginate(10);

        $judul = 'tunggu';
        return view('dashboard.booking.booking', [
            'bookings' => $booking,
            'judul' => $judul
        ]);
    }

    public function sukses()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->cari(request('cari'))->sukses()->paginate(10);

        $judul = 'sukses';
        return view('dashboard.booking.booking', [
            'bookings' => $booking,
            'judul' => $judul
        ]);
    }

    public function Selesai()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->cari(request('cari'))->selesai()->paginate(10);

        $judul = 'selesai';
        return view('dashboard.booking.booking', [
            'bookings' => $booking,
            'judul' => $judul
        ]);
    }


    public function update(Request $request, Booking $booking)
    {
        $validateData = $request->validate([
            'opsi' => 'required'
        ]);

        Booking::where('id', $booking->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }
}
