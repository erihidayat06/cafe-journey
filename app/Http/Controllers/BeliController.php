<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cafe = Beli::filter()->latest()->get();
        $cafe = $cafe->unique('no_pesanan');
        $pesanan = Beli::filter()->latest()->get();

        return view('pesanan.index', [
            'cafes' => $cafe,
            'pesanan' => $pesanan
        ]);
    }

    // Halaman Draf

    public function draf()
    {
        $cafe = Beli::filter()->latest()->get();
        $cafe = $cafe->where('no_pesanan', null)->unique('cafe_id');
        $pesanan = Beli::filter()->latest()->get();
        return view('pesanan.draf', [
            'cafes' => $cafe,
            'pesanan' => $pesanan
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
        if ($request->pemilik == auth()->user()->id) {
            return redirect()->back()->with('error', 'Tidak Boleh Pesan, di Cafe Sendiri');
        };


        $validasiData = $request->validate([
            'jumlah' => 'required',
            'no_pesanan' => '',
            'user_id' => 'required',
            'cafe_id' => 'required',
            'minum_id' => '',
            'makanan_id' => '',
        ]);



        Beli::create($validasiData);


        return redirect()->back()->with('success', 'Pesanan Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beli $beli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beli $beli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beli $beli)
    {
        $validasiData = $request->validate([
            'no_pesanan' => ''
        ]);

        $validasiData['no_pesanan'] = strtoupper(substr(auth()->user()->name, 0, 3) . rand(0, 9999) . substr(md5(time()), 0, 4) . substr(auth()->user()->no_telepon, -4));


        if (!isset($beli->no_pesanan)) {
            Beli::Where('cafe_id', $beli->cafe_id)->Where('no_pesanan', null)->Where('user_id', auth()->user()->id)->update($validasiData);
        }

        return redirect('/beli')->with('success', 'Berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beli $beli)
    {

        if (!isset($beli->no_pesanan)) {
            Beli::Where('cafe_id', $beli->cafe_id)->Where('no_pesanan', null)->Where('user_id', auth()->user()->id)->delete();
        } else {
            Beli::where('id', $beli->id)->delete();
        }


        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }

    public function destroyPesanan(Beli $beli)
    {


        if (!isset($beli->no_pesanan)) {
            Beli::Where('cafe_id', $beli->cafe_id)->Where('id', $beli->id)->Where('no_pesanan', null)->Where('user_id', auth()->user()->id)->delete();
        } else {
            Beli::where('id', $beli->id)->delete();
        }


        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }
}
