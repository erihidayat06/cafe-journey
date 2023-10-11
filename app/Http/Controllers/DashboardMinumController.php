<?php

namespace App\Http\Controllers;

use App\Models\Minum;
use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardMinumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.menu.minuman.index', [
            'minumans' => Minum::filter()->latest()->cari(request('cari'))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menu.minuman.create', [
            'cafe' => Cafe::cafe()->latest()->get()[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_minuman' => 'required|min:3',
            'harga' => 'required|min:3',
            'deskripsi' => 'required|max:250',
            'cafe_id' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        };

        Minum::create($validateData);

        return redirect('dashboard/minum/')->with('success', 'Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(minum $minum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(minum $minum)
    {
        return view('dashboard.menu.minuman.edit', [
            'minuman' => $minum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, minum $minum)
    {

        $validateData = $request->validate([
            'nama_minuman' => 'required|min:3',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($request->file('gambar')) {
            if (isset($request->gambar_lama)) {
                Storage::delete($request->gambar_lama);
            }
            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Minum::where('id', $minum->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(minum $minum)
    {
        if (isset($minum->gambar)) {
            Storage::delete($minum->gambar);
        }

        Minum::where('id', $minum->id)->delete();

        return redirect()->back()->with('error', 'Berhasil Di Hapus');
    }
}
