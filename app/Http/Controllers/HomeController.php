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
        // Menghitung Performa cafe
        $performa = [];

        foreach (Cafe::latest()->where('konfirmasi', 'konfirmasi')->get() as $cafe) {
            $performa[] = [
                ($cafe->ulasan->sum('rating') + $cafe->beli->where('no_pesanan', '!==', null)->sum('jumlah')),
                $cafe->nama_cafe
            ];
        }

        // Sortir Terbesar
        arsort($performa);

        // Ambil Data
        $topPerformers = array_slice($performa, 0, 4);

        // Data Cafe (retrieve only 4 records)
        $cafes = Cafe::latest()->where('konfirmasi', 'konfirmasi')->take(4)->get();

        // Return View
        return view('index', [
            'cafes' => $cafes,
            'lencana' => Cafe::latest()->where('konfirmasi', 'konfirmasi')->get(),
            'performa' => $topPerformers,
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

    // All Cafes with Pagination
    public function cafes()
    {
        return view('pages/cafes', [
            'cafes' => Cafe::latest()->where('konfirmasi', 'konfirmasi')->paginate(6),
            'lencana' => Cafe::latest()->where('konfirmasi', 'konfirmasi')->get(),
        ]);
    }
}
