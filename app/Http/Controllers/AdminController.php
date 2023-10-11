<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function daftarCafe()
    {
        $cafes = Cafe::latest()->get();
        return view('admin.daftarCafe',[
            'cafes' => $cafes
        ]);
    }

    public function daftarCafeTunggu()
    {
        $cafes = Cafe::latest()->where('konfirmasi', 'tunggu')->get();
        return view('admin.daftarCafe',[
            'cafes' => $cafes
        ]);
    }

    public function daftarCafeKonfir()
    {
        $cafes = Cafe::latest()->where('konfirmasi', 'konfirmasi')->get();
        return view('admin.daftarCafe',[
            'cafes' => $cafes
        ]);
    }

    public function konfirmasi(Request $request, Cafe $cafe)
    {
        $validasi = $request->validate([
            'konfirmasi' => 'required'
        ]);
        Cafe::where('id' , $cafe->id)->update($validasi);

        return redirect()->back()->with('success', 'Data Berhasil di Rubah');
    }
}
