<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Beli;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Home Page
    public function index()
    {
        $i = [];

        // Menghitung Performa cafe
        foreach (Cafe::latest()->where('konfirmasi', 'konfirmasi')->get() as $cafe) {
            $i[] = [($cafe->ulasan->sum('rating') + $cafe->beli->where('no_pesanan', '!==', null)->sum('jumlah')), $cafe->nama_cafe];
        }

        // Sortir Terbesar
        arsort($i);

        // Ambil Data
        $a = [];
        foreach ($i as $b) {
            $a[] = $b[1];
        }

        return view('index', [
            'cafes' => Cafe::latest()->where('konfirmasi', 'konfirmasi')->cari(request(['cari']))->get(),
            'lencana' => $a
        ]);
    }

    // Help Page
    public function help()
    {
        return view('pages/help');
    }

    // About Page
    public function about()
    {
        return view('pages/about');
    }
}
