<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.foto.index', [
            'fotos' => auth()->user()->cafe->foto
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
        $validasiData = $request->validate([
            'gambar' => 'required',
            'cafe_id' => 'required'
        ]);

        $validasiData['gambar'] = $request->file('gambar')->store('post-images');

        Foto::create($validasiData);
        return redirect()->back()->with('success', 'Foto Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        $validasiData = $request->validate([
            'gambar' => 'required'
        ]);

        if ($request->file('gambar')) {
            if (isset($request->gambar_lama)) {
                Storage::delete($request->gambar_lama);
            }
            $validasiData['gambar'] = $request->file('gambar')->store('post-images');

            Foto::where('id', $foto->id)->update($validasiData);
        }

        return redirect()->back()->with('success', 'Foto Berhasil di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        if (isset($foto->gambar)) {
            Storage::delete($foto->gambar);
            Foto::where('id', $foto->id)->delete();
        }

        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }
}
