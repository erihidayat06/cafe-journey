<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use Illuminate\Http\Request;

class AnalitikController extends Controller
{
    public function index()
    {
        $total = [];
        $db_minuman = Beli::filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->get()->where('cafe_id', auth()->user()->cafe->id);
        foreach ($db_minuman as $beli) {
            if($beli->minum_id !== null){
              $total[$beli->minum->nama_minuman] =   intval($beli->where('minum_id' , $beli->minum_id)->sum('jumlah'));
            }
        }


        arsort($total);

        $b = 0;
        $nama_minum = [];
        $jumlah = [];
        foreach($total as $t=>$u){

            if(request('top')){
                if($b >= request('top')){
                break;
            }
            }


            $b++;

            $nama_minum[] = $t;
            $jumlah[] = $u;
        }

        $total_makanan = [];
        $db_makanan = Beli::filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->get()->where('cafe_id',auth()->user()->cafe->id)->unique('makanan_id');

        foreach ($db_makanan as $beli) {
            if($beli->makanan_id !== null){
              $total_makanan[$beli->makanan->nama_makanan] =   intval($beli->where('makanan_id' , $beli->makanan_id)->sum('jumlah'));
            }
        }



        arsort($total_makanan);

        $i = 0;
        $nama_makanan = [];
        $jumlah_makanan = [];

        foreach($total_makanan as $t=>$u){
            if(request('top')){
                if($i >= request('top')){
                break;
            }
            }
            $i++;

            $nama_makanan[] = $t;
            $jumlah_makanan[] = $u;

        }



        return view('dashboard.analitik.index',[
            'minuman' => $nama_minum,
            'jumlah' => $jumlah,
            'makanan' => $nama_makanan,
            'jumlah_makanan' => $jumlah_makanan
        ]);
    }
}
