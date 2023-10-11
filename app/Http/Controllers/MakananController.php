<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.menu.makanan.index', [
            'makanans' => Makanan::filter()->latest()->cari(request('cari'))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menu.makanan.create', [
            'cafe' => Cafe::cafe()->get()[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_makanan' => 'required|min:3',
            'harga' => 'required|min:3',
            'deskripsi' => 'required|max:250',
            'cafe_id' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        };

        Makanan::create($validateData);

        return redirect('dashboard/makanan/')->with('success', 'Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(makanan $makanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(makanan $makanan)
    {
        return view('dashboard.menu.makanan.edit', [
            'makanan' => $makanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, makanan $makanan)
    {
        $validateData = $request->validate([
            'nama_makanan' => 'required|min:3',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($request->file('gambar')) {
            if (isset($request->gambar_lama)) {
                Storage::delete($request->gambar_lama);
            }
            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Makanan::where('id', $makanan->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(makanan $makanan)
    {
        if ($makanan->gambar) {
            Storage::delete($makanan->gambar);
        }

        Makanan::where('id', $makanan->id)->delete();

        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }
}
