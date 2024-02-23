<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beli;


class DashboardBeliController extends Controller
{
    public function index()
    {


        $pesanan = Beli::dashboard()->latest()->get();
        // qr
        $cafes = Beli::dashboard()->cari(request('cari'))->get();
        $cafes = $cafes->unique('no_pesanan');

        $beli = Beli::dashboard()->latest()->filtertanggal(request(['dari', 'sampai']))->tanggal(request('filter'))->get();
        $beli = $beli->unique('no_pesanan');

        return view('dashboard.beli.index', [
            'cafes' => $cafes,
            'beli' => $beli,
            'pesanans' => $pesanan
        ]);
    }
}
