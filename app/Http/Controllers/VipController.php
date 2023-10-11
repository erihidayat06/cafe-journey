<?php

namespace App\Http\Controllers;

use App\Models\Vip;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('dashboard.reservasi.index', [
            'vips' => Vip::filter()->latest()->cari(request('cari'))->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiDAta = $request->validate([
            'nama_tempat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'kapasitas' => 'required',
            'fasilitas' => '',
            'cafe_id' => ''
        ]);

        $validasiDAta['fasilitas'] = implode(',', $request->fasilitas);


        if ($request->file('gambar')) {
            $validasiDAta['gambar'] = $request->file('gambar')->store('post-images');
        }

        Vip::create($validasiDAta);

        return redirect('/dashboard/vip')->with('success', 'Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vip $vip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vip $vip)
    {

        $a = ['ac', 'proyektor', 'tv', 'papan tulis', 'meja', 'kursi'];
        $b = explode(",", $vip->fasilitas);
        $c = array_diff($a, $b);

        return view('dashboard.reservasi.edit', [
            'vip' => $vip,
            'c' => $c,
            'b' => $b

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vip $vip)
    {
        $validasiDAta = $request->validate([
            'nama_tempat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'kapasitas' => 'required',
            'fasilitas' => '',
            'cafe_id' => 'required'
        ]);

        $validasiDAta['fasilitas'] = implode(',', $request->fasilitas);


        if ($request->file('gambar')) {
            if (isset($request->gambar_lama)) {
                Storage::delete($request->gambar_lama);
            }
            $validasiDAta['gambar'] = $request->file('gambar')->store('post-images');
        }

        Vip::where('id', $vip->id)->update($validasiDAta);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vip $vip)
    {
        Vip::where('id', $vip->id)->delete();

        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }
}
