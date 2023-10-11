<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::filter()->latest()->paginate(10);
        return view('cafe.transaksi.booking', [
            'bookings' => $booking
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->pemilik == auth()->user()->id){
            return redirect()->back()->with('error', 'Tidak Boleh Booking, di Cafe Sendiri');
        };

        $validasiData = $request->validate([
            'tanggal_booking' => 'required',
            'jam_booking' => 'required',
            'user_id' => 'required',
            'vip_id' => 'required',
            'cafe_id' => 'required'
        ]);

        // Jika Ada Tanggal Yang Sama Maka Akan Di Tolak
        $bookings = Booking::all();
        foreach ($bookings->where('cafe_id', $request->cafe_id) as $booking) {
            if ($request->tanggal_booking == $booking->tanggal_booking) {
                return redirect()->back()->with('error', 'Waktu Tersebut Sudah Di booking');
            }
        }

        $validasiData['no_pesanan'] = strtoupper('BOO' . substr(auth()->user()->name, 0, 3) . rand(0, 9999) . substr(md5(time()), 0, 4) . substr(auth()->user()->no_telepon, -4));

        Booking::create($validasiData);

        return redirect('/booking')->with('success', 'Booking Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validasiData = $request->validate([
            'bukti' => ''
        ]);

        if ($request->file('bukti')) {
            if (isset($request->gambar_lama)) {
                Storage::delete($request->gambar_lama);
            }
            $validasiData['bukti'] = $request->file('bukti')->store('post-images');
        }

        Booking::where('id', $booking->id)->update($validasiData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        Booking::where('id', $booking->id)->delete();

        return redirect()->back()->with('error', 'Reservasi Berhasil Di Hapus');
    }
}
