<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Cafe;
use Illuminate\Http\Request;

class AdminLanggananController extends Controller
{
    public function index()
    {
        $now = now();

        $oneWeekAgo = $now->modify('+7 days');

        // Mengambil data dengan menggunakan Eloquent
        $sisa = Cafe::where('langganan', '<', $oneWeekAgo)->get();

        $cafes = Cafe::latest()->get();
        return view('admin.langganan', [
            'cafes' => $cafes,
            'sisa' => $sisa
        ]);
    }

    public function satuMinggu()
    {
        $now = now();

        $oneWeekAgo = $now->modify('+7 days');

        // Mengambil data dengan menggunakan Eloquent
        $cafes = Cafe::where('langganan', '<', $oneWeekAgo)->get();

        return view('admin.langganan', [
            'cafes' => $cafes,
            'sisa' => $cafes
        ]);
    }

    public function tambahWaktu(Request $request, Cafe $cafe)
    {

        $dateTime = new DateTime($cafe->langganan);
        $tambah['langganan'] = $dateTime->modify($request->langganan);


        Cafe::where('id', $cafe->id)->update($tambah);

        return redirect()->back();
    }
}
