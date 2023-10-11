<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function update(Request $request, Jadwal $jadwal)
    {
        $validasiDate = $request->validate([
            'senin_buka' => '',
            'senin_tutup' => '',
            'senin_buka' => '',
            'senin_tutup'  => '',
            'selasa_buka' => '',
            'selasa_tutup' => '',
            'rabu_buka' => '',
            'rabu_tutup' => '',
            'kemis_buka' => '',
            'kemis_tutup' => '',
            'jumat_buka' => '',
            'jumat_tutup' => '',
            'sabtu_buka' => '',
            'sabtu_tutup' => '',
            'minggu_buka' => '',
            'minggu_tutup' => '',
            'opsi' => '',

        ]);
        Jadwal::where('id', $jadwal->id)->update($validasiDate);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }
}
