<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilCafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jadwal = Jadwal::filter()->get();
        $kecamatan = [
            'margasari', 'bumijawa', 'bojong', 'balapulang', 'pagerbarang',
            'lebaksiu', 'jatinegara', 'kedungbanteng', 'pangkah', 'slawi', 'dukuhwaru', 'adiwerna',
            'dukuhturi', 'talang', 'tarub', 'kramat', 'suradadi', 'warureja', 'margadana',
            'tegal barat', 'tegal selatan', 'tegal timur'
        ];

        $domisili = ['Kota Tegal', 'kab tegal'];


        return view('dashboard.index', [
            'cafe' => Cafe::cafe()->get()[0],
            'kecamatan' => $kecamatan,
            'domisili' => $domisili,
            'jadwal' => $jadwal[0]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('profilCafe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Cafe::create($request->all());
        return redirect('/profil-cafe/create')->with('success', 'Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cafe $cafe)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cafe $cafe)
    {

        $kecamatan = [
            'margasari', 'bumijawa', 'bojong', 'balapulang', 'pagerbarang',
            'lebaksiu', 'jatinegara', 'kedungbanteng', 'pangkah', 'slawi', 'dukuhwaru', 'adiwerna',
            'dukuhturi', 'talang', 'tarub', 'kramat', 'suradadi', 'warureja', 'margadana',
            'tegal barat', 'tegal selatan', 'tegal timur'
        ];

        $domisili = ['Kota Tegal', 'kab tegal'];


        return view('dashboard.edit', [
            'cafe' => $cafe,
            'kecamatan' => $kecamatan,
            'domisili' => $domisili
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cafe $cafe)
    {

        $validateData = $request->validate([
            'nama_cafe' => 'required',
            'alamat' => 'required',
            'deskripsi' => '',
            'no_telepon' => '',
            'slug' => '',
            'domisili' => '',
            'kecamatan' => '',
            'whatsapp' => '',
            'facebook' => '',
            'instagram' => '',
            'map' => '',
            'bank' => '',
            'no_rekening' => '',
            'wallet' => '',
            'no_wallet' => '',

        ]);

        $validateData['user_id'] = auth()->user()->id;

        if ($request->file('gambar_profil')) {
            if (isset($request->gambarLama)) {
                Storage::delete($request->gambarLama);
            }
            $validateData['gambar_profil'] = $request->file('gambar_profil')->store('post-images');
        }

        if ($request->file('gambar_logo')) {
            if (isset($request->gambarLamaLogo)) {
                Storage::delete($request->gambarLamaLogo);
            }
            $validateData['gambar_logo'] = $request->file('gambar_logo')->store('post-images');
        }


        Cafe::where('id', $cafe->id)->update($validateData);


        return redirect('/dashboard/cafe/' . $cafe->slug . '/edit')->with('success', 'Berhasil Di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cafe $cafe)
    {
        if (isset($cafe->gambar_logo)) {
            Storage::delete($cafe->gambar_logo);
        }
        if (isset($cafe->gambar_profil)) {
            Storage::delete($cafe->gambar_profil);
        }

        $cafe->delete();

        return redirect('/')->with('error', 'Anda Sudah Bukan Dari Bagian Kami :(');
    }
}
