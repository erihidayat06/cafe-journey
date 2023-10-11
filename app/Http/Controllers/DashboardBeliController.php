<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beli;
use App\Models\Cafe;

class DashboardBeliController extends Controller
{
    public function index()
    {
        $cafe = Beli::dashboard()->latest()->filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->get();
        $cafe = $cafe->unique('no_pesanan');
        $pesanan = Beli::dashboard()->latest()->get();

        return view('dashboard.beli.index', [
            'cafes' => $cafe,
            'pesanan' => $pesanan
        ]);
    }
}
